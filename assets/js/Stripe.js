// $(function(){
//     const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
//     const checkoutButton = $("#checkout-button");
//     checkoutButton.on('click',function(e){
//         e.preventDefault();
//         console.log($('#email').val())
//        $.ajax({
//            url:'index.php?action=pay',
//            method:'post',
//            data:{
//                id:$('#id').val(),
//                auteur:$('#auteur').val(),
//                description:$('#description').val(),
//                titre:$('#titre').val(),
//                prix:$('#prix').val(),
//                quantite:$('#quantite').val(),
//                email:$('#email').val(),
//            },
//            datatype:'json',
//            success:function(session){
//                console.log(session);
//                return stripe.redirectToCheckout({sessionId:session.id})
//            },
//            error:function(){
//                console.log('fail to send!');
//            }
//        })
//     });
// })

// $(document).ready(function() {
//     const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
//     const checkoutButton = $("#submit");
//     checkoutButton.on('click',function(e){
//         e.preventDefault();
//        $.ajax({
//            url:'index.php?action=payment_cal',
//            method:'post',
//            data:{
//                id_client : $('#id_client').val(),
//                id_match : $('#id_match').val(),
//            },
//            datatype:'json',
//            success:function(session){
//                console.log(session);
//                return stripe.redirectToCheckout({sessionId:session.id})
//            },
//            error:function(){
//                console.log('fail to send!');
//            }
//        })
//     });

    
// })