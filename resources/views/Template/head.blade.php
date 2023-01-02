<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambong In Your Hand</title>

  <!-- Boostrap -->
  <!-- CSS only -->
    <link href="{{asset('../Boostrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('../Boostrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <!-- bs icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

  <!-- font sans pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font: Itim -->
  <link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
  <!-- font permanet marker -->
  <link href='https://fonts.googleapis.com/css?family=Permanent Marker' rel='stylesheet'>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Icon -->
  <link rel="shortcut icon" href="{{ asset('../Photo/TambongLogo.jpg') }}">

  <!-- Scrolling -->
  <style>
      .navbar {
        transition: all 500ms ease-in-out;
      }

      .navbar > div {
        transition: all 1000ms ease-in-out;
      }
    </style>

  <!-- Script for scroll -->
  <script src="{{asset('../boostrap/scrollscript.js')}}" defer></script>

  <!-- css hover -->
  <style class="text/css">
    .navbar {
      box-shadow: 10px 0px 5px rgba(0,0,0,0.5);
      border: 1px grey;
    }

    .nav-item.login {
      padding: 10px 0px;
    }
    .nav-link {
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
      text-decoration: none;
      color: #031D44;
      padding: 20px 0px;
      display: inline-block;
      position: relative;
      opacity: 0.75;
    }

    .nav-link:hover {
      opacity: 1;
    }

    .nav-link::before {
      transition: 300ms;
      height: 5px;
      content: "";
      position: absolute;
      background-color: #031D44;
    }

    .nav-link-ltr::before {
      width: 0%;
      bottom: 10px;
    }

    .nav-link-ltr:hover::before {
      width: 100%;
    }
  </style>

  <!-- Script for datetime -->
  <script type="text/javascript" src="{{asset('../boostrap/datetime.js')}}"></script>
  <script type="text/javascript">window.onload = date_time('date_time');</script>




