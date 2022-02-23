<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" href="../../assets/img/smkn1pwt.png">
      <title>ADMIN</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="../../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../assets/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- DataTables -->
      <!-- <link rel="stylesheet" href="../../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
      <!-- Ionicons -->
      <link rel="stylesheet" href="../../assets/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../../assets/dist/css/AdminLTE.min.css">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../../assets/dist/css/skins/_all-skins.min.css">

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
          
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

      <script type="text/javascript" class="init">
        $(document).ready(function() {
        $('#example').DataTable( {
                "scrollX": true,
                fixedColumns:   {
                    leftColumns: 1,
                    leftColumns: 2
                }
            });
        } );
      </script>

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <style>
      .link{
        color: white;
      }
      .link:hover{
        color: rgb(217, 218, 193);
      }
        thead{
          background-color:grey;
          color: white;
        }
        .content-header>h1 {
      margin: 0;
      font-size: 20px
  }
        .head-table{
          background-color:rgb(25, 162, 204);
          color: black;
        }
        
        .userpanel {
          padding-bottom: 20px;
        }

        .nip {
          font-size: 11px;
        }
        th{
          text-align: center;
          
        }
        .scroll{
          width: auto;
          height: auto;
          
          overflow-x: auto;
        }
        .pink{
          background-color:rgb(181, 93, 199);
          color: white;
        }
        .orange{
          background-color:rgb(235, 231, 17);
          color: white;
        }
        .blue-dark{
          background-color:  rgb(31, 17, 235);
          color: white;
        }
        .ungu{
          background-color:   rgb(17, 235, 181);
          color: white;
        }
        .coklat{
          background-color: rgb(160, 51, 36);
          color: white;
        }
      </style>
    </head>