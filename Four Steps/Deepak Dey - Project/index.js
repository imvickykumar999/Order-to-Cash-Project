var firebaseConfig = {
    apiKey: "AIzaSyBhluvr3xwT3Tddr_FhCdk5juh19CAO6LE",
    authDomain: "orderfullfillment-38232.firebaseapp.com",
    projectId: "orderfullfillment-38232",
    databaseURL: "https://orderfullfillment-38232-default-rtdb.firebaseio.com",
    storageBucket: "orderfullfillment-38232.appspot.com",
    messagingSenderId: "228731063649",
    appId: "1:228731063649:web:0675718439b44784f00920"
  };

  firebase.initializeApp(firebaseConfig);
  database  = firebase.database();
  function showDataTable() {
    database.ref('Products').on('value', 
    function(allRecord){
        allRecord.forEach(
            function(CurrentRecord) {
                var id = CurrentRecord.val().product_id;
                var count = CurrentRecord.val().count;
                var city = CurrentRecord.val().city;
                var name = CurrentRecord.val().name;
                var pin = CurrentRecord.val().pin;
                var state = CurrentRecord.val().state;
                AddItem(id,count,city,name,pin,state);
            }
        );
    });
  }

window.onload = showDataTable;
var num = 0;
function AddItem(id,count,city,name,pin,state) {
    var tbody = document.getElementById('tbody1');
    
    var trow = document.createElement('tr');
    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var td5 = document.createElement('td');
    var td6 = document.createElement('td');
    var td7 = document.createElement('td');
    td1.innerHTML = ++num;
    td2.innerHTML = pin;
    td3.innerHTML = name;
    td4.innerHTML = id;
    td5.innerHTML = count;
    td6.innerHTML = city;
    td7.innerHTML = state;

    trow.appendChild(td1);
    trow.appendChild(td2);
    trow.appendChild(td3);
    trow.appendChild(td4);
    trow.appendChild(td5);
    trow.appendChild(td6);
    trow.appendChild(td7);
    tbody.appendChild(trow);
}

var reff = database.ref("Inventory");
  reff.on("value", gotdata);

var show;
  function gotdata(data){
    var scores = data.val();
    var objectLength = Object.keys(scores).length;
    document.getElementById('asdf').innerHTML = objectLength;
    show = scores.details.count;
  }

  var ref = database.ref("Products");
  ref.on("value", gotData);

  var show,notshow;

  function gotData(data){

    var scores = data.val();
    show = scores.details.count;
  }

  var ref = firebase.database().ref();
  ref.on("value",function(snapshot) {
    console.log(snapshot.val());
  })

  function myfun(){
    var dataform = document.getElementById('pname').value;
    var database = firebase.database();
    var userRef = database.ref('Inventory');
    console.log(userRef);
    userRef.orderByChild(userRef).once('value',function(snapshot){
        snapshot.forEach(
            function(CurrentRecord) {
                var id = CurrentRecord.val().product_id;
                var count = CurrentRecord.val().count;
            }
        );
    });
  }

