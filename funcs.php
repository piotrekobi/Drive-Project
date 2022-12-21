<?php
// function listFiles($dir)
// {
//     $files = scandir($dir);
//     $files = array_diff($files, array('..', '.'));
//     $html_code = "<div class='container'>";
//     foreach ($files as $file) {
//         $html_code .= "<button class='fileButton' onclick=\"location.href='$dir/$file'\">
//                       <img class='fileIcon' src='$dir/$file'>
//                       <p>$file</p>
//                       </button>";
//     }

//     $html_code .= "</div>";
//     echo($html_code);
// }
function listFiles($dir)
{
    $files = scandir($dir);
    $files = array_diff($files, array('..', '.'));
    $html_code = "";
    foreach ($files as $file) {
        $html_code .= " <div class='card file-card m-2' style='width: 18rem;'>
                            <img class='card-img-top' alt='' src='$dir/$file'>
                            <div class='card-body'> 
                                <h5 class='card-title'><a href='#' class='stretched-link'>$file</a></h5>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <p class='card-text mb-0'><small class='text-muted'>Jan 1, 2021</small></p>
                                    <p class='card-text'><small class='text-muted'>3.5 MB </small></p>
                                </div>
                            </div>
                        </div>";
    }
    echo($html_code);
}
?>
