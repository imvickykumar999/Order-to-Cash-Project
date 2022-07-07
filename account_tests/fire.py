
def call():
    from firebase_admin import credentials
    # cred = credentials.Certificate('orderfullfillment-38232-firebase-adminsdk-wrsqu-73d0e5de66.json')
    cred = credentials.Certificate('account_tests/orderfullfillment-38232-firebase-adminsdk-wrsqu-73d0e5de66.json')

    url = 'https://orderfullfillment-38232-default-rtdb.firebaseio.com/'
    path = {'databaseURL' : url}

    import firebase_admin
    # https://stackoverflow.com/a/44501290/11493297
    
    if not firebase_admin._apps:
        firebase_admin.initialize_app(cred, path)

    from firebase_admin import db
    refv = db.reference('Products')

    name = refv.get()
    return name

# got_it = call()
# print(got_it.keys())