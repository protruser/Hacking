import requests

url = "http://ctf.segfaulthub.com:9999/login4/login.php"

data=[('UserId', 'dol'), ('pass', 'dol'), ('Submit', 'Login')]

response = requests.post(url, data=data)
a = response.headers

data=[('id', 'doldol'), ('pass', 'dol1234')]