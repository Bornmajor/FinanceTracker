<?php
include('functions.php');

$video_id = $_POST['video_id'];

$query = "SELECT * FROM e_videos WHERE video_id = $video_id";
$select_video = mysqli_query($connection,$query);
checkQuery($select_video);
while($row = mysqli_fetch_assoc($select_video)){
$ytb_url = $row['ytb_url'];

}
?>

<iframe  src="https://www.youtube.com/embed/<?php echo $ytb_url ?>?si=Lwn7xnbniMm7nZPe" 
      title="YouTube video player" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
</iframe>
      