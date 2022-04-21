from time import sleep
import requests


identification = input("ID?")
password = input("Password?")
print(identification)
print(password)
message = {"id" : identification,
           "password" : password}
r = requests.post('http://3.35.209.143/login.php', data = message)
print(r.text)

# 그냥 데이터 보내서 잘 들어가는지 확인이 필요함
while True:
    sleep(1)
    # extract 프로그램들을 실행 ===> 데이터 저장

    # Upload data
        # Read data
        # Upload
    WantedData = {"name" : "NameExample",
                  "rank" : "RankExample",
                  "basic" : 54,
                  "extra" : 3}