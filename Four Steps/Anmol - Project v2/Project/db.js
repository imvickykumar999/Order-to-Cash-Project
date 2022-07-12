var firebaseConfig = {
  apiKey: "AIzaSyAXCasW_DbZl5kNx0NNLUgpIQIZjzO3JSE",
  authDomain: "customerinvoice-810e7.firebaseapp.com",
  databaseURL: "https://customerinvoice-810e7-default-rtdb.firebaseio.com",
  projectId: "customerinvoice-810e7",
  storageBucket: "customerinvoice-810e7.appspot.com",
  messagingSenderId: "444178388269",
  appId: "1:444178388269:web:552fdfebdabdb46ff0afa4"
};

firebase.initializeApp(firebaseConfig);
database = firebase.database();

var pID;

console.log("Firebase connected successfully");
function addItemToDiv(id, status, date, orderTotal, shippingAddress,  pincode, productID, quantity){
  var od = database.ref('OrderDetail');
  var pName, p;
  
  
  var tbody1 = document.getElementById('tbody');
  var trow = document.createElement('tr');
  var td1 = document.createElement('td');
  var td2 = document.createElement('td');
  var td3 = document.createElement('td');
  var td5 = document.createElement('td');
  var td6 = document.createElement('td');
  var td7 = document.createElement('td');
  var td8 = document.createElement('td');
  var td9 = document.createElement('td');
  var td10 = document.createElement('td');
  var td11 = document.createElement('td'); 
  var td12 = document.createElement('td');
  td1.innerHTML = id;
  td2.innerHTML = status;
  td3.innerHTML = date;
  td5.innerHTML = shippingAddress;
  td6.innerHTML = pincode;
  td7.innerHTML = productID;
  td10.innerHTML = quantity;

  //getProductDetail(productID);
  od.orderByChild('productID').equalTo(productID).once('value', function(snapshot){
    snapshot.forEach(function(currentRec){
      pName = currentRec.val().productName;
      p = currentRec.val().amount;
      var amountPayable;
      var discount = currentRec.val().discount;
      var discountPercent = currentRec.val().discountPercent;
      if(discount == true){
        amountPayable = (p*quantity)-discountPercent*(p*quantity)/100;
      }else{
        amountPayable = p*quantity
      }
      td8.innerHTML = pName;
      td9.innerHTML = p;
      td11.innerHTML = discountPercent;
      td12.innerHTML = amountPayable;
      console.log(discount);
    })
  })
  console.log(quantity);
  trow.appendChild(td1);
  trow.appendChild(td2);
  trow.appendChild(td3);
  trow.appendChild(td5);
  trow.appendChild(td6);
  trow.appendChild(td7);
  trow.appendChild(td8);
  trow.appendChild(td9);
  trow.appendChild(td10);
  trow.appendChild(td11);
  trow.appendChild(td12);
  tbody1.appendChild(trow);
}

function FetchAllData(){
  var items;
  //Uses the Invoice DB
  database.ref('Invoices').once('value', function(snapshot){
    snapshot.forEach(
      function(ChildSnapshot){
       let id = ChildSnapshot.val().id;
       let status = ChildSnapshot.val().status;
       let date = ChildSnapshot.val().date;
       let orderTotal = ChildSnapshot.val().orderTotal;
       let shippingAddress = ChildSnapshot.val().shippingAddress;
       let pincode = ChildSnapshot.val().pincode;
       let productID = ChildSnapshot.val().productID;
       let quantity = ChildSnapshot.val().qty;
        addItemToDiv(id, status, date, orderTotal, shippingAddress, pincode, productID, quantity);
      }
    );
  });
}

window.onload(FetchAllData());
