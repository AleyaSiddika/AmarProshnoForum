<?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $info = $_POST['message'];


        $message = '<html><body>';
        $message .= '<h3 style="color:#297db4;">'."Form: ". "$email".'</h3>';
        $message .= '<p style="color:#080; font-size: 18px; "><br/>'."$info".'</p>';
        $message .= '<h3 style="color:#297db4; ">'."Name: ". "$name".'</h3>';
        $message .= '<h3 style="color:#297db4;">' ."Phone: "."$phone".'</h3>';
        $message .= '</html></body>';


        $headers = "Form: ". strip_tags($email)."\r\n";
        $headers .= "Reply-To: ". strip_tags($email)."\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $isSuccess=mail('alonur07@gmail.com','Residential Security and Access',$message,$message);

        if ($isSuccess){
            header('Location: /Contact ');
            return redirect('/Contact')->with('message', 'Your message has been send. Thank You ');
        }
        else{
            header('Location: /Contact');
            return redirect('/Contact')->with('message','Something went wrong ! ');
        }
?>
