const sgMail = require('@sendgrid/mail');
sgMail.setApiKey(process.env.SENDGRID_API_KEY);

const name = document.querySelector('.name');
const email = document.querySelector('.mail');
const subject = document.querySelector('.subject');
const message = document.querySelector('.message');

const full = `Sender: ${name.value} . Message: ${message.value}`;

const submit = document.querySelector('.submit');

const msg = {
	to: 'ayoub.kermout08@gmail.com',
	from: email.value,
	subject: subject.value,
	text: full,
	html: `<p>${full}</p>`,
};

const send = () => {
	if (!name || !email || !subject || !message) return;
	sgMail.send(msg);
};

submit.addEventListener('click', send)