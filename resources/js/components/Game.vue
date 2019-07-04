
<template>
    <div>
        <h1>Tour de jeu {{gameTurn}}</h1>
        <h2>Score {{score}}</h2>
        <table>
            <tbody>
                <tr v-for="boardline in boards">
                    <td v-for="square in boardline">
                        {{square}}
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" 
                class="btn btn-primary btn-lg" @click="slideLeft()">Gauche</button>
        <button type="button" 
                class="btn btn-primary btn-lg" @click="slideRight()">Droite</button>
        <button type="button" 
                class="btn btn-primary btn-lg" @click="slideTop()">Haut</button>
        <button type="button" 
                class="btn btn-primary btn-lg" @click="slideBottom()">Bas</button>
    </div>
</template>

<script>
    export default {
        data(){
            const boards =  [
                [4, 4, 4, 4],
                [0, 0, 0, 0],
                [0, 2, 2, 2],
                [0, 0, 0, 0],
            ];
            return {
                boards,
                nbLines: boards.length,
                nbCol: boards[0].length,
                firstLine: boards[0],
                gameTurn: 1,
            };
        },
        computed: {
            score(){
                let score = 0;
                for (let x = 0; x < this.boards.length; x++) {
                    const boardline = this.boards[x];
                    for (let y = 0; y < boardline.length; y++) {
                        const square = boardline[y];
                        score += this.boards[x][y];
                    }
                }
                return score;
            }   
        },
        created(){
            let tokenNumber = 2;
            const authorizedNumbers = [2, 4];
            while (tokenNumber > 0) {
                const square = this.generateRandomToken();
                if(this.boards[square.x_pos][square.y_pos] == 0)
                {
                    const randomValue = authorizedNumbers[Math.floor(Math.random()*authorizedNumbers.length)];
                    this.boards[square.x_pos][square.y_pos] = randomValue;
                    tokenNumber -= 1;
                }
            }
        },
        methods : {
            generateRandomToken(){
                return {
                    x_pos : Math.floor(Math.random() * 3) + 0,
                    y_pos : Math.floor(Math.random() * 3) + 0
                };
            },
            slideRight(){
                for (let line = 0; line < this.nbLines; line++) {
                    for (let col =  this.boards[line].length - 2 ; col >= 0; col--) {
                        const token = this.boards[line][col];
                        const newSquarePosition = this.getRightPossibleIndex(this.boards[line], col, token);
                        if(newSquarePosition != col)
                        {
                            this.boards[line][col] = 0;
                            if(this.boards[line][newSquarePosition] != 0)
                                this.boards[line][newSquarePosition] = token * token;
                            else
                                this.boards[line][newSquarePosition] = token;
                        }
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            slideLeft(){
                for (let line = 0; line < this.nbLines; line++) {
                    for (let col =  0 ; col < this.boards[line].length; col++) {
                        const token = this.boards[line][col];
                        const newSquarePosition = this.getLeftPossibleIndex(this.boards[line], col, token);
                        if(newSquarePosition != col)
                        {
                            this.boards[line][col] = 0;
                            if(this.boards[line][newSquarePosition] != 0)
                                this.boards[line][newSquarePosition] = token * token;
                            else
                                this.boards[line][newSquarePosition] = token;
                        }
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            slideTop(){
                const firstLine = this.boards[0];

                for (let col = 0; col < this.nbCol; col++) {
                    for(let line = 0; line < this.nbLines; line++) {
                        const token = this.boards[line][col];
                        const newSquareLine = this.getTopPossibleIndex(this.boards, line, col, token, this.nbLines);
                        this.setTokenPosition(line, col, newSquareLine, token);
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            slideBottom(){
                const firstLine = this.boards[0];

                for (let col = 0; col < this.nbCol; col++) {
                    for(let line = this.nbLines - 1; line >= 0; line--) {
                        const token = this.boards[line][col];
                        const newSquareLine = this.getBottomPossibleIndex(this.boards, line, col, token, this.nbLines);
                        this.setTokenPosition(line, col, newSquareLine, token);
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            setTokenPosition(line, col, newSquareLine, token) {
                if(newSquareLine != line)
                {
                    this.boards[line][col] = 0;
                    if(this.boards[newSquareLine][col] != 0)
                        this.boards[newSquareLine][col] = token * token;
                    else
                        this.boards[newSquareLine][col] = token;
                }
            },
            getRightPossibleIndex(line, currentIndex, token){
                let index = currentIndex + 1;
                let stop = false;
                while (index < line.length && !stop) {
                    if(line[index] == 0 || line[index]==token)
                        index++;
                    else
                        stop = true;
                }
                return index - 1;
            },
            getLeftPossibleIndex(line, currentIndex, token){
                let index = currentIndex - 1;
                let stop = false;
                while (index >= 0 && !stop) {
                    if(line[index] == 0 || line[index] == token)
                        index--;
                    else
                        stop = true;
                }
                return index + 1;
            },
            getBottomPossibleIndex(boards, line, col, token, sizeColumn){
                let lineIndex = line + 1;
                let stop = false;
                while (lineIndex < sizeColumn && !stop) {
                    if(boards[lineIndex][col] == 0 || boards[lineIndex][col]==token)
                        lineIndex++;
                    else
                        stop = true;
                }
                return lineIndex - 1;
            },
            getTopPossibleIndex(boards, line, col, token, sizeColumn){
                let lineIndex = line - 1;
                let stop = false;
                while (lineIndex >= 0 && !stop) {
                    if(boards[lineIndex][col] == 0 || boards[lineIndex][col]==token)
                        lineIndex--;
                    else
                        stop = true;
                }
                return lineIndex + 1;
            }
        }
    }
</script>

<style>
table td{
    border: 1px solid;
}
</style>
