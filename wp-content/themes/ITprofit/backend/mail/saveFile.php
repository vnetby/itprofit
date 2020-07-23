<?
function ajax_save_file(){
    if( isset( $_POST['file_upload'] ) ){


        // переместим файлы из временной директории в указанную
        foreach( $_FILES as $key => $file ){

            $overrides = [ 'test_form' => false ];

            $movefile = wp_handle_upload( $file, $overrides );

            if ( $movefile && empty($movefile['error']) ) {
                //echo json_encode(['upload'=>true, 'url'=>$movefile['url'],'type'=>$movefile['type']]);
                echo $movefile['url'].';'.$movefile['type'];
            } else {
                //echo json_encode(['upload'=>false, 'message'=>__('Возможны атаки при загрузке файла! Обратитесь в тех.поддержку!')]);
                echo 0;
            }
        }
    }
}


