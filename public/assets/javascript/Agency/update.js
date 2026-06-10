const updateForm = document.querySelector('form')

updateForm.addEventListener('submit', handleSubmit)

async function handleSubmit(event) {
    event.preventDefault()
    id = document.querySelector('input[type="hidden"]').value
    const data = Object.fromEntries(new FormData(event.target));
    const response = await fetch(`/agencies/${id}`,{
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })

    window.location.href = '/dashboard/#agencies';
}