var data =
    [
        {
            key: "Йоганн Себастьян Бах",
            files:
                [
                    {
                        name: "Токата ре мінор - Йоганн Себастьян Бах",
                        path: "img/notes/Токата ре мінор - Йоганн Себастьян Бах.pdf",
                    }
                ]
        },
        {
            key: "Людвіг ван Бетховен",
            files:
                [
                    {
                        name: "До Елізи - Людвіг ван Бетховен",
                        path: "img/notes/До Елізи - Людвіг ван Бетховен.pdf",
                    },
                    {
                        name: "Місячна соната - Людвіг ван Бетховен",
                        path: "img/notes/Місячна соната - Людвіг ван Бетховен.pdf",
                    }

                ]
        },
        {
            key: "Фридерик Шопен",
            files:
                [
                    {
                        name: "24 прелюдіі - Фредерік Шопен",
                        path: "img/notes/24 прелюдіі - Фредерік Шопен.pdf",
                    }
                ]
        },
        {
            key: "Едвард Гріг",
            files:
                [
                    {
                        name: "Пер Ґюнт в печері гірського короля - Едвард Гріг",
                        path: "img/notes/Пер Ґюнт в печері гірського короля - Едвард Гріг.pdf",
                    }
                ]
        },
        {
            key: "Вольфганг Амадей Моцарт",
            files:
                [
                    {
                        name: "Симфонія 40 соль мінор - Вольфганг Амадей Моцарт",
                        path: "img/notes/Симфонія 40 соль мінор - Вольфганг Амадей Моцарт.pdf",
                    }
                ]
        },
        {
            key: "Арнольд Шенберг",
            files:
                [
                    {
                        name: "Місячний П'єро - Арнольд Шенберг",
                        path: "img/notes/Місячний П'єро - Арнольд Шенберг.pdf",
                    }
                ]
        },
        {
            key: "Леонтович Микола Дмитрович",
            files:
                [
                    {
                        name: "Микола Леонтович - Щедрик",
                        path: "img/notes/Микола Леонтович - Щедрик.pdf",
                    }
                ]
        },
    ]

function result() {
    var res = "none"
    var inp = document.getElementById("inpSearch").value
    for (var i = 0; i < data.length; i++) {
        var words = data[i].key.split(' ')
        for (var j = 0; j < words.length; j++) {
            var inpLetters = inp.split(' ')
            if (inpLetters[0].toUpperCase() == words[j].toUpperCase()) {
                res = data[i]
                break
            }
        }
    }
    document.getElementById("files").innerHTML = ""
    if (res != "none") {
        res.files.forEach(f => {
            document.getElementById("files").innerHTML += `<a href="${f.path}" download> Завантажити <b>${f.name}</b></a>`
        })
    }
    else {
        document.getElementById("files").innerHTML = "Нічого не знайдено"
    }
    //document.getElementById("inpSearch").value = ""
    document.getElementById("tips").innerHTML = ""
    document.getElementById("tips").style.display = "none"
}
function tip() {
    document.getElementById("tips").style.display = "none"
    document.getElementById("tips").innerHTML = ""
    var inp = document.getElementById("inpSearch").value
    if (inp.length != 0) {
        for (var j = 0; j < data.length; j++) {
            var match = 0
            var matchI = 0
            var startInd = data[j].key.toUpperCase().indexOf(inp[matchI].toUpperCase())
            var boldStart = -1
            var boldEnd = -1
            if (startInd != -1) {
                for (var k = startInd; k < data[j].key.length; k++) {
                    if (inp[matchI].toUpperCase() == data[j].key[k].toUpperCase()) {
                        match++
                        matchI++
                        if (boldStart == -1)
                        {
                            boldStart = k
                        }       
                    }
                    else {
                        match = 0
                        matchI = 0
                        boldStart = -1
                    }
                    if (matchI == inp.length) {
                        boldEnd = k+1
                        break
                    }
                }
                if (match == inp.length) {
                    document.getElementById("tips").style.display = "block"
                    var modifWord = data[j].key.slice(0, boldStart) + "<b>" + data[j].key.slice(boldStart, boldEnd) + "</b>" + data[j].key.slice(boldEnd, data[j].key.length)
                    document.getElementById("tips").innerHTML += `<p id = "tip" style="cursor: pointer" onclick = "ins('${data[j].key}')">${modifWord}</p>`
                }
            }
        }
    }
}
function ins(val) 
{
    document.getElementById("inpSearch").value = val
    result()
}
document.getElementById("inpSearch").addEventListener("keydown", () =>
{
    tip()
});
document.addEventListener('mousemove', function (event) {
    var targetElement = document.elementFromPoint(event.clientX, event.clientY);
    if (targetElement.id != "tip" && targetElement.id != "inpSearch") 
    {
        //document.getElementById("tips").style.display = "none"
    }
});