<?php 

	$description = "Some quick example text to build on the card title and make up the bulk of the card's content.";

	include 'templates/header.php';
    include 'templates/nav.php';
    //if (!$cookiesOK) include 'components/userConfirmCookies.php';
?>


    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info" style = "margin-top: 30px">

                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Товар</td>
                            <td class="description">Описание</td>
                            <td class="price">Цена</td>
                            <td class="quantity">Кол-во</td>
                            <td class="total">Всего</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($items as $item) {
                                include 'components/cart_row.php';
                            }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section> <!--/#cart_items-->
	


<?php 
include 'templates/footer.php';


