$.getJSON("http://mcapi.us/server/status?ip=asean.my.to&port=25565", function(data){

    console.log(data)

    var ip = "42.188.144.146";
    var status = data.online;
    var online_player = data.players.now
    var max_player = data.players.max
    var svrunningon = data.server.name

    if (status = true) {
        status_str = "Server is Online " + online_player + "/" + max_player + " Players";
        isonline_str = "Online";
    } else {
        status_str = "Server is Offline";
    }

    $(".sv-ip").append("asean.my.to");
    $(".sv-ipaddress").append(ip);
    $(".sv-status").append(status_str);
    $(".sv-runon").append("Server is running on: " + svrunningon);
    $(".sv-location").append("Server Locate in : Kuching, Malaysia")
    $(".sv-onlineplayers").append(online_player)
    $(".sv-maxplayers").append(max_player)
    $(".sv-serverplayers").append(online_player + "/" + max_player + " Players")
    $(".sv-isonline").append(isonline_str)
        
    var svplayer_0name = data.players.sample[0].name
    $(".svplayer_0name").append(svplayer_0name);
    var svplayer_0profile = "https://minotar.net/avatar/" + svplayer_0name + "/32.png";
    $(".svplayer_0profile").attr("src", svplayer_0profile)
    console.log(svplayer_0profile)

    var svplayer_1name = data.players.sample[1].name
    $(".svplayer_1name").append(svplayer_1name);
    var svplayer_1profile = "https://minotar.net/avatar/" + svplayer_1name + "/32.png";
    $(".svplayer_1profile").attr("src", svplayer_1profile)
    console.log(svplayer_1profile)

    var svplayer_2name = data.players.sample[2].name
    $(".svplayer_2name").append(svplayer_2name);
    var svplayer_2profile = "https://minotar.net/avatar/" + svplayer_2name + "/32.png";
    $(".svplayer_2profile").attr("src", svplayer_2profile)
    console.log(svplayer_2profile)

    var svplayer_3name = data.players.sample[3].name
    $(".svplayer_3name").append(svplayer_3name);
    var svplayer_3profile = "https://minotar.net/avatar/" + svplayer_3name + "/32.png";
    $(".svplayer_3profile").attr("src", svplayer_3profile)
    console.log(svplayer_3profile)

    var svplayer_4name = data.players.sample[4].name
    $(".svplayer_4name").append(svplayer_4name);
    var svplayer_4profile = "https://minotar.net/avatar/" + svplayer_4name + "/35.png";
    $(".svplayer_4profile").attr("src", svplayer_4profile)
    console.log(svplayer_4profile)

    var svplayer_5name = data.players.sample[5].name
    $(".svplayer_5name").append(svplayer_5name);
    var svplayer_5profile = "https://minotar.net/avatar/" + svplayer_5name + "/35.png";
    $(".svplayer_5profile").attr("src", svplayer_5profile)
    console.log(svplayer_5profile)

    var svplayer_6name = data.players.sample[6].name
    $(".svplayer_6name").append(svplayer_6name);
    var svplayer_6profile = "https://minotar.net/avatar/" + svplayer_6name + "/98.png";
    $(".svplayer_6profile").attr("src", svplayer_6profile)
    console.log(svplayer_6profile)

    var svplayer_7name = data.players.sample[7].name
    $(".svplayer_7name").append(svplayer_7name);
    var svplayer_7profile = "https://minotar.net/avatar/" + svplayer_7name + "/98.png";
    $(".svplayer_7profile").attr("src", svplayer_7profile)
    console.log(svplayer_7profile)

    var svplayer_8name = data.players.sample[8].name
    $(".svplayer_8name").append(svplayer_8name);
    var svplayer_8profile = "https://minotar.net/avatar/" + svplayer_8name + "/98.png";
    $(".svplayer_8profile").attr("src", svplayer_8profile)
    console.log(svplayer_8profile)

    var svplayer_9name = data.players.sample[9].name
    $(".svplayer_9name").append(svplayer_9name);
    var svplayer_9profile = "https://minotar.net/avatar/" + svplayer_9name + "/95.png";
    $(".svplayer_9profile").attr("src", svplayer_9profile)
    console.log(svplayer_9profile)

    var svplayer_10name = data.players.sample[10].name
    $(".svplayer_10name").append(svplayer_10name);
    var svplayer_10profile = "https://minotar.net/avatar/" + svplayer_10name + "/95.png";
    $(".svplayer_10profile").attr("src", svplayer_10profile)
    console.log(svplayer_10profile)

    var svplayer_11name = data.players.sample[11].name
    $(".svplayer_11name").append(svplayer_11name);
    var svplayer_11profile = "https://minotar.net/avatar/" + svplayer_11name + "/32.png";
    $(".svplayer_11profile").attr("src", svplayer_11profile)
    console.log(svplayer_11profile)

    var svplayer_12name = data.players.sample[12].name
    $(".svplayer_12name").append(svplayer_12name);
    var svplayer_12profile = "https://minotar.net/avatar/" + svplayer_12name + "/32.png";
    $(".svplayer_12profile").attr("src", svplayer_12profile)
    console.log(svplayer_12profile)

    var svplayer_13name = data.players.sample[13].name
    $(".svplayer_13name").append(svplayer_13name);
    var svplayer_13profile = "https://minotar.net/avatar/" + svplayer_13name + "/32.png";
    $(".svplayer_13profile").attr("src", svplayer_13profile)
    console.log(svplayer_13profile)

    var svplayer_14name = data.players.sample[14].name
    $(".svplayer_14name").append(svplayer_14name);
    var svplayer_14profile = "https://minotar.net/avatar/" + svplayer_14name + "/32.png";
    $(".svplayer_14profile").attr("src", svplayer_14profile)
    console.log(svplayer_14profile)

    var svplayer_15name = data.players.sample[15].name
    $(".svplayer_15name").append(svplayer_15name);
    var svplayer_15profile = "https://minotar.net/avatar/" + svplayer_15name + "/32.png";
    $(".svplayer_15profile").attr("src", svplayer_15profile)
    console.log(svplayer_15profile)

    var svplayer_16name = data.players.sample[16].name
    $(".svplayer_16name").append(svplayer_16name);
    var svplayer_16profile = "https://minotar.net/avatar/" + svplayer_16name + "/32.png";
    $(".svplayer_16profile").attr("src", svplayer_16profile)
    console.log(svplayer_16profile)

    var svplayer_17name = data.players.sample[17].name
    $(".svplayer_17name").append(svplayer_17name);
    var svplayer_17profile = "https://minotar.net/avatar/" + svplayer_17name + "/32.png";
    $(".svplayer_17profile").attr("src", svplayer_17profile)
    console.log(svplayer_17profile)

    var svplayer_18name = data.players.sample[18].name
    $(".svplayer_18name").append(svplayer_18name);
    var svplayer_18profile = "https://minotar.net/avatar/" + svplayer_18name + "/32.png";
    $(".svplayer_18profile").attr("src", svplayer_18profile)
    console.log(svplayer_18profile)

    var svplayer_19name = data.players.sample[19].name
    $(".svplayer_19name").append(svplayer_19name);
    var svplayer_19profile = "https://minotar.net/avatar/" + svplayer_19name + "/32.png";
    $(".svplayer_19profile").attr("src", svplayer_19profile)
    console.log(svplayer_19profile)

});
