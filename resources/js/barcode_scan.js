function barcode_scan(){
    delayInMilliseconds = 2000;
    setTimeout(function() {
        document.getElementsById("barcode_form").submit();
      }, delayInMilliseconds);    
}
