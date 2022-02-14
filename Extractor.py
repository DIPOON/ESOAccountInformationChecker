def extract():
    # 먼저 문서 내부에 있는 엘더스크롤 savedvariables의 여러 저장된 루아 파일을 확인합니다.
    # 자체 개발 에드온의 정보를 확인할 수 있지만 테스트 및 개발 단축을 위해 이미 있는 파일들을 확인해봅시다.
    # 후보로는 WPmA, Superstar, Inventory insight, pollox's daily quest tracker, Urich's Skill Point Finder
    import os
    
    print(os.getlogin())
    # PTS 정보는 나중에...
    AddonSavedVariablesPath = "C:/Users/" + format(os.getlogin()) + "/OneDrive/Documents/Elder Scrolls Online/live/SavedVariables"
    print(AddonSavedVariablesPath)
    for (root, directories, files) in os.walk(AddonSavedVariablesPath):
        for file in files:
            """
            file_path = os.path.join(root, file)
            print(file_path)
            print(file)
            """
            if file == 'WPamA.lua':
                AddonSavedVariableFile = open(os.path.join(root, file), 'r')
                # 파일 파이썬이 이해할 수 있는 형태로
                # 파일 데이터베이스로 ... 그러면 Extract가 아니잖아?
                AddonSavedVariableFile.close