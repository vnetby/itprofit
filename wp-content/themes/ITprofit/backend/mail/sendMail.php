<?
	function ajax_send_mail()
    {
        if(isset($_POST)){

            $subject = "Заявка с сайта ". get_option( 'blogname' );

            $to = get_option( 'admin_email' );

            $message = "<h2>Поступила новая заявка с сайта " . get_option( 'siteurl' ) . "</h2>";

            $message .= "<ul>";
            $message .= "<li><strong>Имя: </strong> ".$_POST['NAME']."</li>";
            $message .= "<li><strong>Телефон: </strong> ".$_POST['TEL']."</li>";
            $message .= "<li><strong>Email: </strong> ".$_POST['EMAIL']."</li>";
            $message .= "<li><strong>Название проекта или компании: </strong> ".$_POST['PROJECT']."</li>";
            $message .= "<li><strong>Коротко о задаче: </strong>".$_POST['REQUEST']."</li>";

            if($_POST["FILE_TYPE"]){
                $arrImgType = [ "image/png", "image/svg+xml", "image/jpeg", "image/jpg" ];
                $message .= "<hr/><li><strong>Прикрепленные файлы:</strong><br/><div style='display:flex;flex-wrap:wrap'>";
                if(in_array($_POST["FILE_TYPE"], $arrImgType)){
                    $message .= "<div style='padding:20px;margin:5px;border:1px solid #ccc;text-align:center'><img src='".$_POST["FILE_URL"]."' style='width:200px;height:auto;margin:0 5px 10px' alt='Фото' /><div>Фото <br/>".$_POST["FILE_URL"]."</div></div>";
                } else {
                    $message .= "<div><a download href='".$_POST["FILE_URL"]."' >".$_POST["FILE_URL"]."</a></div>";
                }
                $message .= "</div></li>";
            }

            $message .= "</ul>";
            $message .= "<hr/><br/>".date('d.m.Y, H:i:s', time());

            $headers  = "Content-type: text/html; charset=utf-8 \r\n";
            $headers .= "From: ITprofit <info@itprofit.by>\r\n";

            if(mail($to, $subject, $message, $headers))
                echo "1";
            else
                echo "0";
        }else{
            echo "0";
        }
    }


