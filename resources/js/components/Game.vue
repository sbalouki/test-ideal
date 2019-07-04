
<template>
    <div>
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
                class="btn btn-primary btn-lg" @click="slideRIght()">Droite</button>
    </div>
</template>

<script>
    export default {
        data(){
            return {boards : [
                    [0, 0, 0, 0],
                    [0, 0, 0, 0],
                    [0, 0, 0, 0],
                    [0, 0, 0, 0],
                ]
            };
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
            slideRIght(){
                for (let i = 0; i < this.boards.length; i++) {
                    const boardline = this.boards[i];
                    for (let j =  boardline.length - 2 ; j >= 0; j--) {
                        const token = boardline[j];
                        const newSquarePosition = this.rightIndexOfNextValue(boardline, j);
                        if(newSquarePosition != j && newSquarePosition < boardline.length)
                        {
                            boardline[j] = 0;
                            boardline[newSquarePosition] = token;
                        }
                    }
                }
                this.$forceUpdate();
            },
            rightIndexOfNextValue(line, currentIndex){
                let index = currentIndex + 1;
                let stop = false;
                while (index < line.length && !stop) {
                    if(line[index] == 0)
                        index++;
                    else
                        stop = true;
                }
                return index - 1;
            }
        }
    }
</script>

<style>
table td{
    border: 1px solid;
}
</style>
