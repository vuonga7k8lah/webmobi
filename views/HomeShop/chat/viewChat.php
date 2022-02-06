<?php

require_once 'views/HomeShop/Header.php';
require_once 'views/HomeShop/Menu.php';
?>

    <main class="content">
        <?php
        if (!isset($_SESSION['isLogin'])) {
            ?>
            <div class="container">
                <div class="col">
                    <h2 style="text-align: center">Contact Form</h2>
                </div>
                <div class="col">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="Email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <button style="display: block;margin: 0 auto" type="submit" class="btn btn-primary">Submit
                        </button>
                    </form>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="container p-0">

                <h1 class="h3 mb-3" style="text-align: center">Contact Shop</h1>

                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-lg-5 col-xl-3 ">
                        </div>
                        <div class="col-12 col-lg-7 col-xl-9">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                             class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong><?= $_SESSION['isLogin'] ?></strong>
                                        <div class="text-muted small"><em>online</em></div>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="chat-messages p-4">

                                    <div class="chat-message-right pb-4">
                                        <div>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                 class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                            <div class="font-weight-bold mb-1">You</div>
                                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                        </div>
                                    </div>

                                    <div class="chat-message-left pb-4">
                                        <div>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                                 class="rounded-circle mr-1" alt="Sharon Lessman" width="40"
                                                 height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal
                                            commodo.
                                        </div>
                                    </div
                                </div>
                            </div>

                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="hidden" name="userID" value="<?= $_SESSION['currentUserID'] ?>">
                                    <input type="hidden" name="username" value="<?= $_SESSION['isLogin'] ?>">
                                    <input type="text" name="content" class="form-control" placeholder="content contact">
                                    <button type="submit" id="send-message" class="btn btn-primary">Send</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </main>
    <br>
<?php
require_once 'views/HomeShop/Footer.php';
