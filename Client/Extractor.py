from slpp import slpp as lua

# Extract and upload 부분만 따서 프로그래밍 테스트중...
# 이 아래가 while 문 아래로 들어가야한다.
# Extract
data ='{'
with open("C:/Users/Public/Documents/Elder Scrolls Online/live/SavedVariables/USPF.lua", 'r') as file:
    for line in file:
        data += line
data += '}'
data = lua.decode(data)
# 이 내부 구조는 원래 데이터를 따름.
name = 0
for AccountName, AccountValue in data['USPF_Settings']['Default'].items():
    # 캐릭터 Key값으로만 나와있어서 이름을 정리한 사전
    CharacterList = {data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"][key]["charId"] : data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"][key]["charName"]
                     for key, value in data['USPF_Settings']['Default'][AccountName]['$AccountWide']["charInfo"].items()}
    for CharacterIDKey, CharacterValue in data['USPF_Settings']['Default'][AccountName]['$AccountWide']["ptsData"].items():
        # 여기서 ID는 ESOPI 사용자의 ID라서 중복되지 않게 넣어주었다.
        message = {"ID" : str(name),
                   "CharacterID" : int(CharacterIDKey),
                   "CharacterName" : CharacterList[CharacterIDKey],
                   "UnassignedSkillPoints" : int(data['USPF_Settings']['Default'][AccountName]['$AccountWide']["ptsData"][CharacterIDKey]['GenTot']) + 3000}
        print(message)
        name += 1
# Update
        import requests
        r = requests.post('http://3.35.209.143/process_data.php', data = message)
        print(r.text, "endswith")