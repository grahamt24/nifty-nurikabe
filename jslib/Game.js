function Game(sel, json){
    var that = this;
    var parsed_json = parse_json(json);
    var solution = parsed_json.game;
    var html = this.setUpGameBoard(solution);
    $(sel).html(html);
    var game = this.setGame(solution);
    this.installListeners(sel, game, solution, parsed_json);
}

Game.prototype.installListeners = function(sel, game, solution, parsed_json){
    var that = this;
    $(sel + " td.cell button").click(function(event) {
        event.preventDefault();
        var loc = this.value.split(',');
        var r = loc[0];
        var c = loc[1];
        var id = "td_" + r + "_" + c;
        var cell = document.getElementById(id);
        if(game[r][c] === 0){
            $(cell).removeClass("none");
            $(cell).removeClass("bad");
            $(cell).addClass("sea");
            game[r][c] = -1;
        }
        else if(game[r][c] === -1){
            $(cell).removeClass("sea");
            $(cell).removeClass("bad");
            $(cell).addClass("none");
            this.innerHTML = '&#9679;';
            game[r][c] = -2;
        }
        else if(game[r][c] === -2){
            $(cell).removeClass("bad");
            this.innerHTML = '&nbsp;';
            game[r][c] = 0;
        }
        var won = that.checkWin(game, solution);
        if(won){
            $(sel).html(that.showSolution(solution));
            document.getElementById("message").innerHTML = "You're a winner!";
            $(document.getElementById("message")).show();
        }
    });

    $(sel + " .gamebuttons .check").click(function(event){
        event.preventDefault();
        that.checkSolution(game, solution);
    });

    $(sel + " .gamebuttons .solve").click(function(event){
        event.preventDefault();
        $(sel + " .gamebuttons").hide();
        $(sel + " .yesno").show();
        that.removeErrors(game,solution);
    });

    $(sel + " .gamebuttons .clear").click(function(event){
        event.preventDefault();
        that.clearGame(game);
        var html = that.setUpGameBoard(solution);
        $(sel).html(html);
        var new_game = that.setGame(solution);
        that.installListeners(sel, new_game, solution);
    });

    $(sel + " .yesno .yes").click(function(event){
        event.preventDefault();
        $(sel + " .yesno").hide();
        $(sel).html(that.showSolution(solution));
        document.getElementById("message").innerHTML = "You're a winner!";
        $(document.getElementById("message")).show();
    });

    $(sel + " .yesno .no").click(function(event){
        event.preventDefault();
        $(sel + " .gamebuttons").show();
        $(sel + " .yesno").hide();
    });
};


Game.prototype.setUpGameBoard = function(solution){
    var that = this;
    var html = '<table class="game">';
    for(var i =0; i<solution.length; i++){
        html += '<tr>';
        for(var j =0; j<solution[i].length; j++){
            if(solution[i][j] === -1 || solution[i][j] === -2){
                html += '<td class="cell none" id="td_' + i + '_' + j + '"><button name="cell" value="' + i + ','
                    + j + '">&nbsp;</button></td>';
            }
            else{
                html += '<td class="cell none" id="td_' + i + '_' + j + '">' + solution[i][j] + '</td>';
            }
        }
        html += '</tr>'
    }
    html += '</table>';
    html += '<div class="gamebuttons"><p><button class="check">Check Solution</button> ' +
        '<button class="solve">Solve</button> ' +
        '<button class="clear">Clear</button></p></div>';
    html += '<div class="yesno" style="display:none"><p>' +
        '<br><button class="yes">Yes</button> <button class="no">No</button></p>' +
        '<br><p class="message">Are you sure you want to solve?</p></div>';
    html += '<div><br><p id="message"></p></div>';
    return html;
};

Game.prototype.setGame = function(solution){
    var game = [];
    for(var i=0; i<solution.length; i++){
        game.push([]);
        for(var j=0; j<solution[i].length; j++){
            if(solution[i][j] === -1 || solution[i][j] === -2){
                game[i].push(0);
            }
            else{
                game[i].push(solution[i][j]);
            }
        }
    }
    return game;
};


Game.prototype.checkWin = function(game, solution){
    for(var i=0; i<game.length; i++){
        for(var j=0; j<game[i].length; j++){
            if(game[i][j] === solution[i][j]) {
                continue;
            }
            else{
                return false;
            }
        }
    }
    return true;
};

Game.prototype.showSolution = function(solution){
    var that = this;
    var html = '<table class="game">';
    for(var i =0; i<solution.length; i++){
        html += '<tr>';
        for(var j =0; j<solution[i].length; j++){
            if(solution[i][j] === -1){
                html += '<td class="cell sea" id="td_' + i + '_' + j + '">&nbsp;</td>';
            }
            else if(solution[i][j] === -2){
                html += '<td class="cell none" id="td_' + i + '_' + j + '">&#9679;</td>'
            }
            else{
                html += '<td class="cell none" id="td_' + i + '_' + j + '">' + solution[i][j] + '</td>';
            }
        }
        html += '</tr>'
    }
    html += '</table><div><br><p id="message"></p></div>';
    return html;
};

Game.prototype.clearGame = function(game){
    var that = this;
    for(var i=0; i<game.length; i++){
        for(var j=0; j<game[i].length; j++){
            if(game[i][j] === -1 || game[i][j] === -2){
                game[i][j] = 0;
            }
        }
    }
};

Game.prototype.checkSolution = function(game, solution){
    for(var i =0; i<game.length;i++){
        for(var j=0; j<game[i].length;j++){
            var id = "td_" + i + "_" + j;
            var cell = document.getElementById(id);
            if(game[i][j] !== solution[i][j] && game[i][j] !== 0){
                $(cell).removeClass("none");
                $(cell).removeClass("sea");
                $(cell).addClass("bad");
            }
        }
    }
};

Game.prototype.removeErrors = function(game, solution){
    for(var i =0; i<game.length;i++){
        for(var j=0; j<game[i].length;j++){
            var id = "td_" + i + "_" + j;
            var cell = document.getElementById(id);
            if(game[i][j] !== solution[i][j] && game[i][j] !== 0){
                $(cell).removeClass("bad");
                if(game[i][j] === -1){
                    $(cell).addClass("sea");
                }
                else if(game[i][j] === -2){
                    $(cell).addClass("none");
                }
            }
        }
    }
};