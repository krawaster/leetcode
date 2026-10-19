import java.util.HashSet;
import java.util.Set;

class Solution {
    public boolean isValidSudoku(char[][] board) {
        Set<Character>[] rows = new HashSet[9];
        Set<Character>[] cols = new HashSet[9];
        Set<Character>[] box = new HashSet[9];

        for (int i = 0; i < 9; i++) {
            rows[i] = new HashSet<>();
            cols[i] = new HashSet<>();
            box[i] = new HashSet<>();
        }

        for (int i = 0; i < 9; i++) {
            for (int j = 0; j < 9; j++) {
                if (board[i][j] == '.')
                    continue;
                char val = board[i][j];

                if (rows[i].contains(val))
                    return false;
                if (cols[j].contains(val))
                    return false;

                int boxRow = i / 3;
                int boxCol = j / 3;
                int boxIndex = 3 * boxRow + boxCol;

                if (box[boxIndex].contains(val))
                    return false;

                rows[i].add(val);
                cols[j].add(val);
                box[boxIndex].add(val);

            }
        }

        return true;
    }
}