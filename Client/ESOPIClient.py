from slpp import slpp as lua
from time import sleep

import requests


# User Authentication
identification = input("ID?")
password = input("Password?")
# 네. 여기 비밀번호 hash 안된 상태로 전달되는 것이 큰 문제입니다.
# 거꾸로 만들어야 합니다. 클라이언트에서는 해싱해서 보내고 서버에서는 원래 데이터를 이용해서 검증하고.
message = {"id" : identification,
           "password" : password}

with requests.Session() as s:
    r = requests.post('http://3.35.209.143/login.php', data=message)
    print(r.status_code)
    print(type(r.status_code))

    if r.status_code == 401:
        print("아 다시 쳐야하는데...")
        exit()
    elif r.status_code == 200:
        print("된건가")
        # ID 검증이 성공하면 해당 ID로 데이터 전송
        # Extract and upload data
        while True:
            print("HELLO????")
            sleep(10)
            # Extract
            data = '{'
            with open("C:/Users/Public/Documents/Elder Scrolls Online/live/SavedVariables/USPF.lua", 'r') as file:
                for line in file:
                    data += line
            data += '}'
            data = lua.decode(data)
            # 이 내부 구조는 원래 데이터를 따름.
            for AccountName, AccountValue in data['USPF_Settings']['Default'].items():
                # 캐릭터 Key값으로만 나와있어서 이름을 정리한 사전
                CharacterList = {
                    data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"][key]["charId"]:
                        data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"][key]["charName"]
                    for key, value in
                    data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"].items()}
                for CharacterIDKey, CharacterValue in data['USPF_Settings']['Default'][AccountName]['$AccountWide'][
                    "ptsData"].items():
                    message = {"ID": identification,
                               "CharacterID": int(CharacterIDKey),
                               "CharacterName": CharacterList[CharacterIDKey],
                               "UnassignedSkillPoints": int(
                                   data['USPF_Settings']['Default'][AccountName]['$AccountWide']["ptsData"][CharacterIDKey]['GenTot'])}
                    # Update
                    r = requests.post('http://3.35.209.143/process_data.php', data=message)
            sleep(10)
    else:
        print("일단은 예외")
        exit()