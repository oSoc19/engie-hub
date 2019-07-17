import Pusher from 'pusher';

Pusher.logToConsole = true;

export default new Pusher(process.env.MIX_PUSHER_APP_KEY, {
  cluster: 'eu',
  forceTLS: true
});
