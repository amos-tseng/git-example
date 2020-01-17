<?php

namespace Board\BoardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Board\BoardBundle\Entity\Board;
use Board\BoardBundle\Entity\User;
use Board\BoardBundle\Form\BoardForm;
use DateTime;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $boards = $em->createQueryBuilder()
                     ->select('b')
                     ->from('BoardBundle:Board',  'b')
                     ->addOrderBy('b.updateTime', 'DESC')
                     ->getQuery()
                     ->getResult();

        return $this->render('BoardBundle:Default:index.html.twig', array(
            'boards' => $boards
        ));


    }
//留言板輸入頁
    public function contactAction()
    {
        $User = new User();
        $Board = new Board();
        $form = $this->createForm(New BoardForm(), $Board);

        $em = $this->getDoctrine()->getEntityManager(); 
	$request = $this->getRequest();
        if ('POST' === $request->getMethod()) {
        $name = $request->get('name');
	$title = $request->get('title');
	$message = $request->get('message');
            if ($name != null && $message != null && $title != null){
                $user = $request->get('name');
                $user1 = $em->getRepository('BoardBundle:User')->findBy(array('user'=>$user ));
                if ( $user1 == Array()){
                    $time = new DateTime('now');
                    $User-> setUser($name);
                    $User-> setLasttime($time);
                    $Board-> setName($name);
                    $Board-> setTitle($title);
                    $Board-> setMessage($message);
                    $Board-> setUpdateTime($time);
               
                    $em = $this->getDoctrine()->getEntityManager();
                    $em->persist($User);
                    $em->persist($Board);
                    $em->flush();
                    echo '<meta http-equiv=REFRESH CONTENT=0;url=board>';
                } else  {
                    $time = new DateTime('now');
                    $user = $request->get('name');
                    $Board-> setName($name);
                    $Board-> setTitle($title);
                    $Board-> setMessage($message);
                    $Board-> setUpdateTime($time);
                    $em = $this->getDoctrine()->getEntityManager();
                    $User = $em->getRepository('BoardBundle:User')-> findOneByuser($user);
                    $User-> setLasttime($time);
                    $em-> persist($User);
                    $em->persist($Board);
                    $em->flush();
                   echo '<meta http-equiv=REFRESH CONTENT=0;url=board>';
               }
            } else {
                echo "<h1>請輸入完整</h1>";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=board>';
            }
            if ($form->isValid()) {
           
                return $this->redirect($this->generateUrl('Board_homepage'));
            }
        }

        return $this->render('BoardBundle:Default:contact.html.twig', array(
        'form' => $form->createView()
         ));
    }

//留言個別顯示
    public function showAction()
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $users = $em->createQueryBuilder()
                    ->select('b')
                    ->from('BoardBundle:User',  'b')
                    ->addOrderBy('b.lasttime', 'DESC')
                    ->getQuery()
                    ->getResult();

        return $this->render('BoardBundle:Default:show.html.twig', array(
            'users' => $users
        ));
    }

    public function modifyAction()
    {
        switch ( $_POST['action'] ) {
            case "刪除":
                 $id = $_POST['id'];
                 $em = $this->getDoctrine()->getEntityManager();
                 $Board = $em->find('BoardBundle:Board', $id);
                 $em->remove($Board);
                 $em->flush();
		 echo '刪除成功';
                 echo '<meta http-equiv=REFRESH CONTENT=1;url=board>';
                 break; 
            case "修改":
                 $request = $this->getRequest();
                 $id = $request->get('id');
                 $id1 = $_POST['id'];
                 echo $id ;
     	         echo	'<form action="mod" method="post">';
                 echo   "<input type='hidden' name='id' value= '$id'>";
                 echo   "<p>修改留言</p>
                         
                         標題：<input type='text' name='title' ></br>
                         <p>留言：</p>
                         <textarea name='message'></textarea><br>
                         <input type='submit' value='修改留言'>
                         </form>";
            }

        return $this->render('BoardBundle:Default:modify.html.twig');
    }

    public function modAction()
    {
        $request = $this->getRequest();
        $id = $request->get('id');
        //$name = $request->get('name');
        $title = $request->get('title');
        $message = $request->get('message');
        $time = new DateTime('now');
        if ( $message != null && $title != null) {
            echo '編號' . $id;
            echo '接收到的內容為: ' . $message;
            $em = $this->getDoctrine()->getEntityManager();
            $Board = $em->find('BoardBundle:Board', $id);
            // $Board-> setName($name);
            $Board-> setTitle($title);
            $Board-> setMessage($message);
            $Board-> setUpdateTime($time);
            $em-> persist($Board);
            $em -> flush();
            echo '<meta http-equiv=REFRESH CONTENT=1;url=board>';
        } else {
            echo "請輸入完整";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=board>';
        }


        return $this->render('BoardBundle:Default:mod.html.twig');
    }


}
