$(function () {
    
    $("#createnewinvoice").validate({
        ignore: [],
        rules: {
            dInvoiceDate: {
                required: true              
            },
            vPhoneNo: {
                required: true                               
            },
            vSellerName: {
                required: true               
            },
            vSellerAddress: {
                required: true               
            },
            vSellerCity: {
                required: true               
            },
            vSellerState: {
                required: true               
            },
            vSellerCountry: {
                required: true               
            },
            vSellerZip: {
                required: true               
            },
            vBuyerName: {
                required: true               
            },
            vBuyerAddress: {
                required: true               
            },
            vBuyerCity: {
                required: true               
            },
            vBuyerState: {
                required: true               
            },
            vBuyerCountry: {
                required: true               
            },
            vBuyerZip: {
                required: true               
            },
            AmazonACManagerName: {
                required: true               
            },
            vAmazonACManagerAddress: {
                required: true               
            },
            vAmazonACManagerCity: {
                required: true               
            },
            vAmazonACManagerState: {
                required: true               
            },
            vAmazonACManagerCountry: {
                required: true               
            },
            vAmazonACManagerZip: {
                required: true               
            },
            vShippingName: {
                required: true               
            },
            vShippingAddress: {
                required: true               
            },
            vShippingCity: {
                required: true               
            },
            vShippingState: {
                required: true               
            },
            vShippingCountry: {
                required: true               
            },
            vShippingZip: {
                required: true               
            }
        },
        highlight: function(input) {                            
            $(input).addClass('error');                        
        },                        
        errorPlacement: function(error,element) {                            
            return true;                          
        }
    });
});