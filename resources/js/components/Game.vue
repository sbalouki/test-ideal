
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
    </div>
</template>

<script>
    export default {
        data(){
            return {
                boards: [
                    [0, 0, 0, 2],
                    [0, 0, 4, 4],
                    [0, 0, 0, 2],
                    [0, 0, 0, 0],
                ],
                gameTurn: 1
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
                const square = this.generateRandomSquare();
                if(this.boards[square.x_pos][square.y_pos] == 0)
                {
                    const randomValue = authorizedNumbers[Math.floor(Math.random()*authorizedNumbers.length)];
                    this.boards[square.x_pos][square.y_pos] = randomValue;
                    tokenNumber -= 1;
                }
            }
        },
        methods : {
            generateRandomSquare(){
                return {
                    x_pos : Math.floor(Math.random() * 3) + 0,
                    y_pos : Math.floor(Math.random() * 3) + 0
                };
            },
            slideRight(){
                for (let i = 0; i < this.boards.length; i++) {
                    const boardline = this.boards[i];
                    for (let j =  boardline.length - 2 ; j >= 0; j--) {
                        const token = boardline[j];
                        const newSquarePosition = this.rightIndexOfNextValue(boardline, j, token);
                        if(newSquarePosition != j)
                        {
                            boardline[j] = 0;
                            if(boardline[newSquarePosition] != 0)
                                boardline[newSquarePosition] = token * token;
                            else
                                boardline[newSquarePosition] = token;
                        }
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            slideLeft(){
                for (let i = 0; i < this.boards.length; i++) {
                    const boardline = this.boards[i];
                    for (let j =  0 ; j < boardline.length; j++) {
                        const token = boardline[j];
                        const newSquarePosition = this.leftIndexOfNextValue(boardline, j, token);
                        if(newSquarePosition != j)
                        {
                            boardline[j] = 0;
                            if(boardline[newSquarePosition] != 0)
                                boardline[newSquarePosition] = token * token;
                            else
                                boardline[newSquarePosition] = token;
                        }
                    }
                }
                this.gameTurn += 1;
                this.$forceUpdate();
            },
            rightIndexOfNextValue(line, currentIndex, token){
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
            leftIndexOfNextValue(line, currentIndex, token){
                let index = currentIndex -1;
                let stop = false;
                while (index >= 0 && !stop) {
                    if(line[index] == 0 || line[index] == token)
                        index--;
                    else
                        stop = true;
                }
                return index + 1;
            }
        }
    }
</script>

<style>
table td{
    border: 1px solid;
}
</style>
