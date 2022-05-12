<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/image/admin-logo.png">
  <link rel="icon" type="image/png" href="assets/image/admin-logo.png">
  <title>
    Jewelry-Notification
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="assets/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
  <!-- font prompt -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet"></head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
<style>
  * {
    font-family: 'Prompt', sans-serif;
    }
    .btn-NGG{
        background: #750505;
    }
    .btn-green3{
        background: #34a853;
    }
    .btn-blue2{
        background: #1e48dd;
    }
    .bg-gray1{
        background: #fbfbfb;
    }
    .btn-next{
        background: rgb(7,94,150);
        background: linear-gradient(0deg, rgba(7,94,150,1) 0%, rgba(2,11,65,1) 100%);
        }
        .btn-blue{
        background: linear-gradient(0deg, rgba(7,94,150,1) 0%, #0084a3 100%);
        }
        .btn-green2{
        background: linear-gradient(0deg, rgba(7,94,150,1) 0%, #0084a3 100%);
        }
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: "Poppins", sans-serif;
}
.step-wizard {
    background-color: #750505;
    background-image: linear-gradient(19deg, #21d4fd 0%, #b721ff 100%);
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.step-wizard-list{
    background: #fff;
    
    color: #333;
    list-style-type: none;
    border-radius: 10px;
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}

.step-wizard-item{
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive:1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}
.step-wizard-item + .step-wizard-item:after{
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background: #750505;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}
.progress-count{
    height: 40px;
    width:40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index:10;
    color: transparent;
}
.progress-count:after{
    content: "";
    height: 40px;
    width: 40px;
    background: #750505;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    z-index: -10;
}
.progress-count:before{
    content: "";
    height: 10px;
    width: 20px;
    border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%) rotate(-45deg);
    transform-origin: center center;
}
.progress-label{
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
}
.current-item .progress-count:before,
.current-item ~ .step-wizard-item .progress-count:before{
    display: none;
}
.current-item ~ .step-wizard-item .progress-count:after{
    height:10px;
    width:10px;
}
.current-item ~ .step-wizard-item .progress-label{
    opacity: 0.5;
}
.current-item .progress-count:after{
    background: #fff;
    border: 2px solid #750505;
}
.current-item .progress-count{
    color: #750505;
}
    body {
        font-family: Arial;
        border-radius: 25px;
        background-color: #343a40;
    }

    * {
        box-sizing: border-box;
        border-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    form.example input[type=text] {
        padding: 4px;
    font-size: 13px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #ffff;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 2px;
        background:#344767;
        color: white;
        font-size: 15px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        border-radius: 10px;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
    body {
        font-family: Arial;
        border-radius: 25px;
        background-color: #343a40;
    }

    * {
        box-sizing: border-box;
        border-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    form.example input[type=text] {
        padding: 4px;
    font-size: 13px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #ffff;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 2px;
        background:#344767;
        color: white;
        font-size: 15px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        border-radius: 10px;
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
    
</style>