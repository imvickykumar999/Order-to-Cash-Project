
def call():
    from firebase_admin import credentials
    cred = credentials.Certificate('mydatabase/credentials.json')

    url = 'https://neosalpha-999-default-rtdb.firebaseio.com/'
    path = {'databaseURL' : url}

    import firebase_admin
    # https://stackoverflow.com/a/44501290/11493297
    
    if not firebase_admin._apps:
        firebase_admin.initialize_app(cred, path)

    from firebase_admin import db
    refv = db.reference('mydatabase/views')

    name = refv.get()
    name = name + 1

    refv.set(name)
    return name
