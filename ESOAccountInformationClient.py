print("Command Available : exit, extract")
while True:
    Command = input("Command?")
    if Command == 'exit':
        break
    if Command == 'extract':
        import Extractor
        Extractor.extract()
    else:
        print("예외 처리 아직 못한 프로그램이라서 무조건 Availalbe Command만 처리할 수 있습니다.")