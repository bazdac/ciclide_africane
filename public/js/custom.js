//scadere cantitate
$('.minus').on('click',function () {
    var inputCantitate = $(this).closest('.parinte-cantitate').find('.cantitate-produs');
    var cantitate = inputCantitate.val();
    if(cantitate<=1){
        return;
    }
    inputCantitate.val(parseInt(cantitate)-1);
})
//adaugare
$('.plus').on('click',function () {
    var inputCantitate = $(this).closest('.parinte-cantitate').find('.cantitate-produs');
    var cantitate = inputCantitate.val();
    var stoc = inputCantitate.data('stoc');
    if(cantitate>=stoc){
        return;
    }
    inputCantitate.val(parseInt(cantitate)+1);
})
