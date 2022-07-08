
from firebase_admin import credentials

cred = credentials.Certificate('account_tests/neosalpha-999-firebase-adminsdk-ieub5-79247029d5.json')

url = 'https://neosalpha-999-default-rtdb.firebaseio.com/'
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

#     for j in range(3):
#         for i in range(2):
#             pincode = random.randint(100000,999999)
#             PID = random.randint(10000,99999)
#             dit = random.randint(1000,9999)

#             data = {'details': {'count': random.randint(10,99), 'product_id': f'{PID}'}}
#             refv = db.reference(f'Inventory/{dit}')
#             refv.set(data)

#             data = {'details': {'count': random.randint(10,99), 'product_id': f'{PID}'},
#                      'location': {'city': 'Noida', 'pin': pincode, 'state': 'UP'}}
#             refv = db.reference(f'Products/{dit}')
#             refv.set(data)

#     refv = db.reference(f'Products')
#     name = refv.get()
#     return name

# got_it = sample()
# print(got_it)