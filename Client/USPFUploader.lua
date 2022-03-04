function Upload(AddonName, Path)
  dofile(Path..AddonName..".lua")
  -- 흑흑 각 에드온에서 테이블 이름을 뭐라고 했는지는 확인이 필요
  print(type(USPF_Settings))
  for k, v in pairs(USPF_Settings["Default"]["@AccountName"]["$AccountWide"]) do
    print(k, "===>" ,v)
  end
end

Upload("USPF", "C:/Users/UserName/OneDrive/Documents/Elder Scrolls Online/live/SavedVariables/")