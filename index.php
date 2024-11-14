<?php
session_start();
include "template/mainheader.php";

if (isset($_SESSION['username'])) {
    echo "<h4> Selamat datang, " . $_SESSION['username'] . "</h4>";
}
?>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni similique eveniet 
    laborum id? Obcaecati magni, dolore, cupiditate, sunt sint ipsum nam est recusandae 
    delectus vero cumque omnis reprehenderit consequatur quo?
</p>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas quidem totam, 
    culpa nostrum commodi quaerat repellat! Qui perferendis modi labore eligendi eius? 
    Facilis fuga veritatis neque enim similique, dignissimos impedit.
</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, ad quisquam? 
    Molestias sapiente obcaecati inventore cum beatae praesentium. Doloribus ducimus 
    eveniet rem cum quidem soluta laudantium vero quae accusamus eos.
</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore saepe impedit 
    itaque natus. Voluptatum quos dolorem, nesciunt deserunt harum natus laudantium 
    reprehenderit? Officia omnis delectus, amet culpa nisi quia illum.
</p>

<?php
include "template/mainfooter.php";
?>