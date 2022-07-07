
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


def call():
    refv = db.reference('Products')
    name = refv.get()
    return name


# -----------------( SAMPLE DATA ENTRY )----------------------------

# def sample():
#     import random

#     for j in range(4):
#         for i in range(3):
#             UID = random.randint(1000,9999)
#             pincode = random.randint(100000,999999)

#             data = {'details': {'count': random.randint(10,99), 'product_id': f'{random.randint(10000,99999)}'}, 'location': {'city': 'Noida', 'pin': pincode, 'state': 'UP'}}
#             refv = db.reference(f'Products/{UID}')
#             refv.set(data)

#     refv = db.reference(f'Products')
#     name = refv.get()
#     return name

# got_it = sample()
# print(got_it)