<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Lunchbox</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
    }

    .bg-container {
        background: url('https://img.freepik.com/free-photo/plate-biryani-with-bunch-spices-it_505751-3812.jpg') no-repeat center center;
        background-size: cover;
        height: 100vh;
        color: white;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }

    .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        /* Dark overlay to make text more readable */
    }

    .content {
        position: relative;
        z-index: 2;
    }

    .banner-heading {
        font-size: 3rem;
        font-weight: bold;
    }

    .banner-para {
        font-size: 1.5rem;
    }

    .banner-order-button {
        background-color: #ff5722;
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        margin: 0.5rem;
        cursor: pointer;
        text-decoration: none;
    }

    .banner-order-button:hover {
        background-color: #e64a19;
    }

    .navbar-logo {
        height: 40px;
        margin-right: 10px;
    }

    .wcu-section {
        background-color: #fff;
        padding: 2rem 0;
    }

    .wcu-card-image {
        max-height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .wcu-card-title {
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .wcu-card-description {
        font-size: 1rem;
    }

    .explore-menu-section {
        background-color: #f8f9fa;
        padding: 2rem 0;
    }

    .menu-card-image {
        max-height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .menu-card-title {
        font-size: 1.25rem;
        margin-top: 10px;
    }

    .menu-card-link {
        font-size: 1rem;
        color: #007bff;
    }

    .healthy-food-section img,
    .healthy-food-section h1,
    .healthy-food-section p,
    .follow-us-section img,
    .footer-section img {
        max-width: 100%;
    }

    .healthy-food-image {
        width: 100%;
        height: auto;
    }

    .follow-us-icon-container {
        margin: 10px;
    }

    .follow-us-icon-container i {
        font-size: 2rem;
    }

    #get-help-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border-radius: 50px;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        text-align: center;
    }

    #get-help-icon:hover {
        background-color: #0056b3;
    }

    #chat-container {
        position: fixed;
        bottom: 70px;
        right: 20px;
        width: 300px;
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    #chat-box {
        display: flex;
        flex-direction: column;
        height: 400px;
    }

    #chat-log {
        flex: 1;
        overflow-y: auto;
        padding: 10px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
    }

    #user-input {
        border: none;
        padding: 10px;
        width: 80%;
        box-sizing: border-box;
    }

    #send-btn {
        border: none;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    #send-btn:hover {
        background-color: #0056b3;
    }


    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .bg-container {
            padding: 20px;
        }

        .banner-heading {
            font-size: 2rem;
        }

        .banner-para {
            font-size: 1.25rem;
        }

        .wcu-card {
            margin-bottom: 20px;
        }

        .menu-card-container {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .navbar-nav {
            flex-direction: column;
        }

        .banner-heading {
            font-size: 1.5rem;
        }

        .banner-para {
            font-size: 1rem;
        }

        .banner-order-button {
            padding: 0.5rem 1rem;
        }

        .wcu-card-title,
        .menu-card-title {
            font-size: 1rem;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <h3><b>DIGITAL LUNCHBOX</b></h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" id="nav-link1" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link custom-nav-link" id="nav-link2" href="#sectionWcu">Why Choose Us?</a>
                <a class="nav-link custom-nav-link" id="nav-link3" href="#sectionExplore">Explore Menu</a>
                <a class="nav-link custom-nav-link" id="nav-link4" href="#sectionDeliveryPayments">Delivery &
                    Payments</a>
                <a class="nav-link custom-nav-link" id="nav-link3" href="order.php">Order now</a>
                <a class="nav-link custom-nav-link" id="nav-link3" href="admin.php">Admin</a>
                <!--<div id="userDisplay" class="nav-link custom-nav-link user-display" onclick="openModal()">Username</div>-->
                <style>
                .user-display {
                    font-size: 1.5em;
                    font-weight: bold;
                    text-align: center;
                    margin-top: 0;
                    margin-left: 20px;
                    line-height: 1.5;
                    cursor: pointer;
                    /* Pointer cursor for user's name */
                }

                .nav-link {
                    display: flex;
                    align-items: center;
                    padding: 10px;
                }

                .menu-card {
                    border: 1px solid #ddd;
                    border-radius: 5px;
                    overflow: hidden;
                    text-align: center;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .menu-card-image {
                    max-width: 100%;
                    height: auto;
                }

                .menu-card-title {
                    font-size: 1.5rem;
                    margin: 0.5rem 0;
                }

                .menu-card-link {
                    font-size: 1.2rem;
                    color: #333;
                    text-decoration: none;
                    display: block;
                    margin: 0.5rem 0;
                }

                .menu-card-stars {
                    color: #FFD700;

                    /* Gold color */
                    /* Modal styles */
                    .modal {
                        display: none;
                        position: fixed;
                        z-index: 1;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0, 0, 0, 0.6);
                        /* Semi-transparent background */
                        padding-top: 60px;
                    }

                    modal {
                        display: none;
                        position: fixed;
                        z-index: 1;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        overflow: auto;
                        background-color: rgba(0, 0, 0, 0.6);
                        /* Semi-transparent background */
                        padding-top: 60px;
                    }

                    /* Modal content */
                    .modal-content {
                        background-color: #fefefe;
                        margin: 5% auto;
                        padding: 20px;
                        border-radius: 10px;
                        /* Rounded corners */
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                        /* Drop shadow */
                        width: 80%;
                        max-width: 400px;
                        /* Maximum width */
                        text-align: center;
                        /* Center align content */
                    }

                    /* Close button */
                    .close {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                    }

                    .close:hover,
                    .close:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                    }

                    /* Logout button */
                    .logout-btn {
                        background-color: #d9534f;
                        /* Bootstrap danger color */
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                        font-size: 1em;
                        transition: background-color 0.3s ease;
                        /* Smooth transition */
                    }

                    .logout-btn:hover {
                        background-color: #c9302c;
                        /* Darker red on hover */
                    }
                </style>
            </div>
        </div>
    </nav>
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
    </div>


    <div class="bg-container">
        <div class="bg-overlay"></div>
        <div class="content">
            <h1 class="banner-heading">Digital Lunchbox</h1>
            <p class="banner-para">Exploring your taste buds</p>
            <div class="d-flex flex-row justify-content-center">
                <a href="order.php" class="banner-order-button">Order Now</a>
            </div>
        </div>
    </div>

    <div class="wcu-section pb-5 pt-5" id="sectionWcu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="wcu-heading">Why Choose Us?</h1>
                    <p class="wcu-para">We use both original recipes and classic versions of famous food items</p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://logowik.com/content/uploads/images/food-service4537.jpg"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Food Service</h1>
                        <p class="wcu-card-description">Experience fine dining at the comfort of your home. All our
                            orders are carefully packed and arranged to give you nothing less than perfect.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://cdn.dribbble.com/users/1700393/screenshots/15866159/media/ac942cba190f0eabddfc3b725be4958a.png?compress=1&resize=400x300&vertical=top"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Fresh Food</h1>
                        <p class="wcu-card-description">The Fresh Food group provides fresh-cut fruits and vegetables
                            directly picked from our partner farms so that you always get them tree to plate.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="wcu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-tdRmq9MEQVkUvhLZA7GxxhwHxlHkYw_MPQ&s"
                            class="wcu-card-image" />
                        <h1 class="wcu-card-title">Affordable Prices</h1>
                        <p class="wcu-card-description">We offer competitive and affordable prices to make sure you
                            don't have to worry about your pocket when enjoying our meals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="explore-menu-section pb-5 pt-5" id="sectionExplore">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="explore-menu-heading">Explore Menu</h1>
                    <p class="explore-menu-para">Find all our exclusive menus, specials, and offers only on our official
                        website.</p>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSsaz3hkdie6gzWeFBOuhE3nFozIykz72Vtw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Kienyeji + Fish wet fry with cornmeal/rice</h1>
                        <a class="menu-card-link">KES 350/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRr8sEjxL1baluyLvGPEIBXGXJ2G83iUK3fEQ&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Beef dry fry with pasta</h1>
                        <a class="menu-card-link">KES 300/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKJ2GLvhny0_A1bC1gK_sCCj9lPoJKHHFXZg&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Githeri with potatoes diced avocado</h1>
                        <a class="menu-card-link">KES 200/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOOf9VSOdHslA2NHV6FHY34cgPgggwpoKMkQ&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Marinated Chicken with vegetable rice</h1>
                        <a class="menu-card-link">KES 600/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://i0.wp.com/gwenjikoni.com/wp-content/uploads/2022/09/20220807_205107.jpg?resize=768%2C1024"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Swahili Pilau with Guacamole</h1>
                        <a class="menu-card-link">KES 450/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>SPECIAL OFFER</b></h3>
                        <img src="https://www.indianhealthyrecipes.com/wp-content/uploads/2021/12/chicken-biryani.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Chicken Biryani + Guacamole</h1>
                        <a class="menu-card-link">KES 750/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>SPECIAL OFFER</b></h3>
                        <img src="https://c8.alamy.com/comp/M6856R/fried-pork-chop-french-fries-and-vegetables-isolated-on-white-background-M6856R.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Pork & Fries</h1>
                        <a class="menu-card-link">KES 450/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>DRINKS</b></h3>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_nW5HmtisOkf3FhNXFoCuqDbBaw6l9Xca5Q&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Lemonade</h1>
                        <a class="menu-card-link">KES 250/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://t3.ftcdn.net/jpg/01/28/80/64/360_F_128806474_w6f5w2DZKATJXJKwfGTWQAsqVmFbCngy.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Milkshake</h1>
                        <a class="menu-card-link">KES 400/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLoQT4rJ-OBZ01D_Ym8UuRIZmkaaBR-zOURA&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Fresh Juice</h1>
                        <a class="menu-card-link">KES 250/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="data:image/jpeg;base64,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NeWcDJqOt8xWeob5f607s8z4cb5vy14cq7lyizpI21Pm0XHgdjLFPOabv7GKquG52wq/j/LSHGOcsPdWFL/lrz1pNQ7lJxZr+80qDXEiE4aIvg+dW/mfF5lUeVUOxxO2r5tflT7HcwW3HX5V0sU8Hmwtgu8QunWiy2tMHxqnx+VFrGqDv9KbBa9RDHM13lriWTCsJ6VlnHLma8x86k7HMttbZWT8jVexOLVmmpMVso9x3eMim4WujfWvUuL41CRS3kXw661f+U8Z2dtvSqDavL+IfOpfC8XtopGcVDJi0GPuZrpPnSGJE0zfHoWmaW+2IfvClaYykhA26d4JdRSPap+NfzClbGIQH31/MKEmGUapwvH5MEyz0rKcU/7Yt51Yxx+0LWTtV28aqOKxK5iZB9NacMo44hczGaZRS1y8ppPOKEEsMXwpitG5V4j2eHceIrNrV5R1qZw3GEVCub6GmQ0XEMViO8/nNQV0604vYoEnWmrOKgWUkK4ZoINSeIxeYjyqHV6U7cUEKSwd4+5JpnSlx5pOmKpPLCiiiggKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooA//9k="
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Mocktails</h1>
                        <a class="menu-card-link">KES 350/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <h3><b>BREAKFAST</b></h3>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ83PYzUsA4R5YIYwGercD03A2KyLa6-5Qoqw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Arrowroots boiled</h1>
                        <a class="menu-card-link">KES 150/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk_UhmrZk3KfshGH3KOS7cTMsMMr-h6uQ8ag&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Sweet potatoes</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYc2bqbl8ujDN3V8xDkbVi8q304PssDTLBvw&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">French Toast</h1>
                        <a class="menu-card-link">KES 170/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_FUVRW-blRtQjZDQzUeWqrDJkJHZFGss_8w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Spanish</h1>
                        <a class="menu-card-link">KES 150/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHxAg3Z0eXTNB2c15i5VwKYA4nMFG1hM7-DA&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Tea</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkisB4t7GFDoeQipGM7LZe-sReyQi3l4qG0w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Brewed Coffee</h1>
                        <a class="menu-card-link">KES 100/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://media.istockphoto.com/id/183138035/photo/cup-of-latte-coffee-and-spoon-on-gray-counter.jpg?s=612x612&w=0&k=20&c=Iht-hG2bzxiZgpjao6RELKAbw4oG7ujS2wQNkiM2rqU="
                            class="menu-card-image" />
                        <h1 class="menu-card-title">White Coffee</h1>
                        <a class="menu-card-link">KES 200/=</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY84Gfp-lQK5ZOPqNxluRZu-lZfxzfszoKvg&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Pancakes</h1>
                        <a class="menu-card-link">KES 50/= Each</a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6SY0Gi1gjv_lzejSqJH3NJlH1zi7ltWHF_w&s"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Sausages / Smokies</h1>
                        <a class="menu-card-link">KES 50/= </a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="menu-card p-3 mb-2">
                        <img src="https://t4.ftcdn.net/jpg/05/11/08/05/360_F_511080597_NvqjRdezlARSQHy4VpAKFvUVTEeGdlLy.jpg"
                            class="menu-card-image" />
                        <h1 class="menu-card-title">Samosa</h1>
                        <a class="menu-card-link">KES 70/= Each </a>
                        <div class="menu-card-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="healthy-food-section pb-5 pt-5" id="sectionHealthyFood">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="https://media.istockphoto.com/id/1457433817/photo/group-of-healthy-food-for-flexitarian-diet.jpg?s=612x612&w=0&k=20&c=v48RE0ZNWpMZOlSp13KdF1yFDmidorO2pZTu2Idmd3M="
                        class="healthy-food-image" alt="Healthy Food">
                </div>
                <div class="col-12 col-md-6">
                    <h1 class="healthy-food-heading">Healthy Food</h1>
                    <p class="healthy-food-para">We believe in offering nothing but the best and healthiest food options
                        for our customers. Whether you're on a diet or just prefer healthy food, we've got you covered.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="follow-us-section pb-5 pt-5" id="sectionDeliveryPayments">
        <div class="container text-center">

            <h4>You call, we deliver</h4>
            <h4>You can pay before delivery or pay on delivery</h4>
            <img
                src="https://monito-cms.imgix.net/05d5d4c0-1683-4340-87a8-38d72ba36b94_MPESA.png?auto=compress,format&rect=0,0,3000,1285&w=1800&h=771" />
            <br> <br>

            <h1 class="follow-us-heading">Drop us a line / Contact us </h1>
            <a href="https://wa.me/+254113138193" target="_blank">Click here to chat with me on WhatsApp</a> <br> <br>


            <a href="billomolo230@gmail.com">Click here to Send me an email</a> <br> <br>


            <a href="tel:+254113138193">Click here to Call me</a>

            <div id="get-help-icon">
                💬 Get Help
            </div>

            <!-- Chat Interface -->
            <div id="chat-container" style="display: none;">
                <div id="chat-box">
                    <div id="chat-log"></div>
                    <input type="text" id="user-input" placeholder="Type your message...">
                    <button id="send-btn">Send</button>
                </div>
            </div>
            <script>
            document.getElementById('get-help-icon').addEventListener('click', function() {
                const chatContainer = document.getElementById('chat-container');
                if (chatContainer.style.display === 'none' || chatContainer.style.display === '') {
                    chatContainer.style.display = 'block';
                } else {
                    chatContainer.style.display = 'none';
                }
            });

            document.getElementById('send-btn').addEventListener('click', function() {
                const userInput = document.getElementById('user-input').value;
                if (userInput.trim() !== "") {
                    addMessage('User', userInput);
                    getBotResponse(userInput);
                    document.getElementById('user-input').value = "";
                }
            });

            function addMessage(sender, message) {
                const chatLog = document.getElementById('chat-log');
                const messageDiv = document.createElement('div');
                messageDiv.textContent = `${sender}: ${message}`;
                chatLog.appendChild(messageDiv);
                chatLog.scrollTop = chatLog.scrollHeight;
            }

            function getBotResponse(userMessage) {
                let botResponse = '';

                // Simple responses based on keywords
                if (userMessage.toLowerCase().includes('hello')) {
                    botResponse = 'Hi there! How can I assist you today?';
                } else if (userMessage.toLowerCase().includes('hi')) {
                    botResponse = 'Hi there! How can I assist you today?';
                } else if (userMessage.toLowerCase().includes('order')) {
                    botResponse = 'You can place an order by visiting our order page. Select many items as you like';
                } else if (userMessage.toLowerCase().includes('contact')) {
                    botResponse = 'You can contact us using this number:  +254113138193.';
                } else if (userMessage.toLowerCase().includes('pay')) {
                    botResponse = 'You can pay on delivery or pay in advance using the given number: +254113138193';
                } else if (userMessage.toLowerCase().includes('menu')) {
                    botResponse = 'Navigate to menu section in the homepage see for yourself !!';
                } else if (userMessage.toLowerCase().includes('thank you ')) {
                    botResponse = 'Anytime. Feel free to ask anything bugging you';
                } else {
                    botResponse = 'I\'m not sure how to help with that. Please try asking something else.';
                }

                addMessage('Digital Lunchbox', botResponse);
            }
            </script>



        </div>
    </div>

    <div class="footer-section pb-5 pt-5 bg-dark text-white">
        <div class="container text-center">
            <h1 class="footer-heading">Digital Lunchbox</h1>
            <p class="footer-para">Exploring your Taste Buds </p>
            <p class="footer-para">&copy; 2024 Digital Lunchbox. All Rights Reserved.</p>
        </div>
    </div>
    <script src="home.js"></script>
    <script>
    function openModal() {
        document.getElementById('userModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
    }

    function logout() {
        // Clear user data from local storage
        localStorage.removeItem('userName');
        localStorage.removeItem('userPassword');
        // Redirect to login page
        window.location.href = 'index.php';
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById('userModal')) {
            document.getElementById('userModal').style.display = 'none';
        }
    }
    </script>

</body>

</html>