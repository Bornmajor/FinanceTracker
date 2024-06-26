<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<style>
    /** The Magic **/
.btn-breadcrumb .btn:not(:last-child):after {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid white;
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: 100%;
  z-index: 3;
}
.btn-breadcrumb .btn:not(:last-child):before {
  content: " ";
  display: block;
  width: 0;
  height: 0;
  border-top: 17px solid transparent;
  border-bottom: 17px solid transparent;
  border-left: 10px solid rgb(173, 173, 173);
  position: absolute;
  top: 50%;
  margin-top: -17px;
  margin-left: 1px;
  left: 100%;
  z-index: 3;
}

/** The Spacing **/
.btn-breadcrumb .btn {
  padding:6px 12px 6px 24px;
}
.btn-breadcrumb .btn:first-child {
  padding:6px 6px 6px 10px;
}
.btn-breadcrumb .btn:last-child {
  padding:6px 18px 6px 24px;
}

/** Default button **/
.btn-breadcrumb .btn.btn-default:not(:last-child):after {
  border-left: 10px solid #fff;
}
.btn-breadcrumb .btn.btn-default:not(:last-child):before {
  border-left: 10px solid #ccc;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):after {
  border-left: 10px solid #ebebeb;
}
.btn-breadcrumb .btn.btn-default:hover:not(:last-child):before {
  border-left: 10px solid #adadad;
}

/** Primary button **/
.btn-breadcrumb .btn.btn-primary:not(:last-child):after {
  border-left: 10px solid #428bca;
}
.btn-breadcrumb .btn.btn-primary:not(:last-child):before {
  border-left: 10px solid #357ebd;
}
.btn-breadcrumb .btn.btn-primary:hover:not(:last-child):after {
  border-left: 10px solid #3276b1;
}
.btn-breadcrumb .btn.btn-primary:hover:not(:last-child):before {
  border-left: 10px solid #285e8e;
}

/** Success button **/
.btn-breadcrumb .btn.btn-success:not(:last-child):after {
  border-left: 10px solid #5cb85c;
}
.btn-breadcrumb .btn.btn-success:not(:last-child):before {
  border-left: 10px solid #4cae4c;
}
.btn-breadcrumb .btn.btn-success:hover:not(:last-child):after {
  border-left: 10px solid #47a447;
}
.btn-breadcrumb .btn.btn-success:hover:not(:last-child):before {
  border-left: 10px solid #398439;
}

/** Danger button **/
.btn-breadcrumb .btn.btn-danger:not(:last-child):after {
  border-left: 10px solid #d9534f;
}
.btn-breadcrumb .btn.btn-danger:not(:last-child):before {
  border-left: 10px solid #d43f3a;
}
.btn-breadcrumb .btn.btn-danger:hover:not(:last-child):after {
  border-left: 10px solid #d2322d;
}
.btn-breadcrumb .btn.btn-danger:hover:not(:last-child):before {
  border-left: 10px solid #ac2925;
}

/** Warning button **/
.btn-breadcrumb .btn.btn-warning:not(:last-child):after {
  border-left: 10px solid #f0ad4e;
}
.btn-breadcrumb .btn.btn-warning:not(:last-child):before {
  border-left: 10px solid #eea236;
}
.btn-breadcrumb .btn.btn-warning:hover:not(:last-child):after {
  border-left: 10px solid #ed9c28;
}
.btn-breadcrumb .btn.btn-warning:hover:not(:last-child):before {
  border-left: 10px solid #d58512;
}

/** Info button **/
.btn-breadcrumb .btn.btn-info:not(:last-child):after {
  border-left: 10px solid #5bc0de;
}
.btn-breadcrumb .btn.btn-info:not(:last-child):before {
  border-left: 10px solid #46b8da;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):after {
  border-left: 10px solid #39b3d7;
}
.btn-breadcrumb .btn.btn-info:hover:not(:last-child):before {
  border-left: 10px solid #269abc;
}
</style>
</head>




<div class="container">
    <div class="row">
		<h2>Breadcrumb Default</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-default">Snippets</a>
            <a href="#" class="btn btn-default">Breadcrumbs</a>
            <a href="#" class="btn btn-default">Default</a>
        </div>
	</div>
    <div class="row">
    	<h2>Breadcrumb Primary</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-primary">Snippets</a>
            <a href="#" class="btn btn-primary">Breadcrumbs</a>
            <a href="#" class="btn btn-primary">Primary</a>
        </div>
	</div>
    <div class="row">
        <h2>Breadcrumb Success</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-success">Snippets</a>
            <a href="#" class="btn btn-success">Breadcrumbs</a>
            <a href="#" class="btn btn-success">Success</a>
        </div>
	</div>
    <div class="row">
    	<h2>Breadcrumb Info</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-info"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-info">Snippets</a>
            <a href="#" class="btn btn-info">Breadcrumbs</a>
            <a href="#" class="btn btn-info">Info</a>
        </div>
	</div>
    <div class="row">
    	<h2>Breadcrumb Warning</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-warning">Snippets</a>
            <a href="#" class="btn btn-warning">Breadcrumbs</a>
            <a href="#" class="btn btn-warning">Warning</a>
        </div>
	</div>
    <div class="row">
    	<h2>Breadcrumb Danger</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-danger"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-danger">Snippets</a>
            <a href="#" class="btn btn-danger">Breadcrumbs</a>
            <a href="#" class="btn btn-danger">Danger</a>
        </div>
	</div>
    <div class="row">
        <h2>Breadcrumb Rainbow</h2>
        <div class="btn-group btn-breadcrumb">
            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
            <a href="#" class="btn btn-info">Snippets</a>
            <a href="#" class="btn btn-success">Breadcrumbs</a>
            <a href="#" class="btn btn-warning">Rainbow</a>
        </div>
	</div>
</div>