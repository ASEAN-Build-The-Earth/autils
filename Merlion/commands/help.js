const Discord = require('discord.js');
const moment = require('moment');
module.exports = {
	name: 'help',
	description: 'A cool help',
	execute(message){
		const date = moment().format('lll');
		const Help = new Discord.MessageEmbed()
		.setColor('#00FFFF')
		.setAuthor(`${message.author.username}`, `${message.author.displayAvatarURL({ dynamic: true })}`)
		.setTitle('A cool help for ASEAN BTE')
		.addFields(
			{ name: "Prefix", value: "m!" },
			{ name: "Commands", value: "/ping\n/rule\n/ip\n/8ball\n/	avatar" },
			)
		.setFooter('Content requested at: ' + date)
		message.channel.send(Help)
	}
}