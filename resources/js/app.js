import './bootstrap';

console.log('APP HIDUP');

window.Echo.channel('chat')
    .listen('.pesan-baru', (e) => {

        console.log('REALTIME MASUK');

        location.reload();

    });

window.Echo.join('online')

    .here((users) => {

        users.forEach((user) => {

            let status = document.getElementById('status-' + user.id);

            if(status){

                status.classList.add('online');
                status.innerText = 'Online';

            }

        });

    })

    .joining((user) => {

        let status = document.getElementById('status-' + user.id);

        if(status){

            status.classList.add('online');

        }

    })

    .leaving((user) => {

        let status = document.getElementById('status-' + user.id);

        if(status){

            status.classList.remove('online');
            status.innerText = 'Offline';

        }

    });

const groupId = document.querySelector('#group-id');

if(groupId){

    window.Echo.channel(`group.${groupId.value}`)

        .listen('.group-pesan-baru', (e) => {

            console.log('GROUP REALTIME');

            console.log(e);

            location.reload();

        });

}