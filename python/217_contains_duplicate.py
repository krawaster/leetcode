class Solution:
    def containsDuplicate(self, nums: list[int]) -> bool:
        seen = set()
        for i in range(len(nums)):
            if nums[i] in seen:
                return True
            else :
                seen.add(nums[i])

            return False 