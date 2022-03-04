# Command 는 ABC 순서
print("Command Available : exit, extract, upload")
while True:
    Command = input("Command?")
    if Command.lower() == 'exit':
        break
    if Command.lower() == 'extract':
        # extract 프로그램들을 실행
    if Command.lower() == 'upload':
        # 데이터 얻어와서
        # 내가 만들어둔 csv 파일 읽기
        import requests
        WantedData = {"name" : "NameExample",
                      "rank" : "RankExample",
                      "basic" : 54,
                      "extra" : 3
	                }
        # ID PW 헤더 더하기
        # 쏘세요!
        r = requests.post('http://3.35.209.143/create_process.php', data = WantedData)
        print(r.text)
    else:
        print("예외 처리 아직 못한 프로그램이라서 무조건 Availalbe Command만 처리할 수 있습니다.")