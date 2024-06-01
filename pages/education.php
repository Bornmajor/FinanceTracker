<?php include("includes/header.php"); ?>
<title>FinanceTraker | Education</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

<div class="container-finance-education">

  
    <div class="breadcmb-container">
          <div class="btn-group btn-breadcrumb">
            <!-- <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a> -->
            <a href="?page=home" class="btn btn-info"><i class="fas fa-home" style="color:#3b7e44;"></i> <span  style="color:#3b7e44;">Home</span> </a>
            <a href="#" class="btn btn-info"><i class="fas fa-book" style="color:#3b7e44;"></i> <span  style="color:#3b7e44;">E-learning</span></a>
            <!-- <a href="#" class="btn btn-info">Primary</a> -->
        </div>
   
    </div>
   
<!-- 
    <div class="search-category-list mb-3">
        <input type="text" class="form-control" placeholder="Search for a topic"> 

        <select class="form-select" aria-label="Default select example">
        <option selected>Category</option>
        <option value="1">Business</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        </select>

    </div>

    <div class="mb-4">
   
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Tags</a>
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Marketing</a>
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Tags</a>
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Tags</a>
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Marketing</a>
    <a href="#" class="education-tag btn btn-success "><i class="fas fa-tag"></i> Tags</a>

    </div> -->

    <div class="container-education-cards ">

    <?php

    $query = "SELECT * FROM e_videos";
    $select_videos = mysqli_query($connection,$query);
    checkQuery($select_videos);
    while($row = mysqli_fetch_assoc($select_videos)){
    $video_id =   $row['video_id'];
    $ytb_url = $row['ytb_url'];
    $thumb_nail = $row['thumb_nail'];
    $video_title = $row['video_title'];
    $video_author = $row['video_author'];

    ?>
    <!-- #list of ytb videos-->
        <div class="card education-card" video-id="<?php echo $video_id ?>" style="width: 15rem;" data-bs-toggle="modal" data-bs-target="#ytbModal">
     <img src="<?php echo $thumb_nail; ?>" class="card-img-top" alt="...">
    <div class="card-body education-desc-icon">
        
        <div>
         <h5 class="card-title"><?php echo $video_title; ?></h5>
        <p class="card-text"><?php echo $video_author; ?></p>   
        </div>
        
     
        
     
    </div>
    </div>

    <?php
    }

    ?>




   


   


 
  

    </div>


    <!-- <div class="pagination-container mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination ">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div> -->



</div>



<!-- Youtube Modal -->
<div class="modal fade" id="ytbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body youtube-content">

      <div class="d-flex flex-column align-items-center justify-content-center">
         <div class="loader"></div>
         <span >Loading...</span>

      </div>
        
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script>
    $('.education-card').click(function(e){
      let video_id =  $(this).attr('video-id');

      $.post("async/youtube_content_modal.php",{video_id:video_id},function(data){
        $(".youtube-content").html(data);
      });

    })
</script>


<?php include('includes/footer.php');?>