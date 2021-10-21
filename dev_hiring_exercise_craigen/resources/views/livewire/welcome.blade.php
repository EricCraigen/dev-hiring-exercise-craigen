<div>
    <div class="flex flex-col w-full h-full p-5 sm:p-10">
        <h1 class="text-3xl font-black text-gray-900">
            To Michalis,
        </h1>
        <h4 class="text-2xl font-extrabold text-gray-900 mt-10 mx-5">
            Thank you for allowing me the opportunity to interview and perform this
            dev hiring exercise.
        </h4>
        <p class="text-gray-900 text-lg font-semibold mt-5 mx-10">
            I have tried to put balance into the applicaiton in regards to front-end UI/UX and back-end functionality
            given the time contraint.
        </p>
        <p class="text-gray-900 text-lg font-semibold mt-5 mx-10">
            I will say up front that this is the first test I have taken and I hope that I have hit the proverbial nail on the head. I am not please with how long the seeding
            takes with 50k records (at around <span class="line-through">47secs</span> 18secs on my MacBook Pro M1), but this is acceptable to me given I have also never done this before this test.
        </p>
        <p class="text-gray-900 text-lg font-semibold mt-5 mx-10">
            The only other issue I have with my application is that the CSV export takes much too long in my opinion (at about an hour on my fastest run while testing different cache settings for the excel package).
            However, I was able to figure out how to chain the jobs and created another job that gets passed the user that requested the export in order to update a attribute on its model (has_export).
            This allowed me to toggle displaying the download button on the front end until the job was completed and there is indeed a file in at the path passed into the download helper function.
        </p>
        <p class="text-gray-900 text-lg font-semibold mt-10 mx-20 text-right">
            Respectfully,<br />
            <span>Eric Craigen</span>
        </p>
        <p class="text-gray-900 text-lg font-semibold mt-5 mx-10">
            - P.S. I have gone ahead and made the default user role to administrator, so you can create an account to get started right
            away. This will allow you to view and create patients, as well as to start the export jobs queue to export the patient records to CSV as requested.
            <br />
            <br />
            I hope that you enjoy what I have put together. Any feed back would be greatly appreciated.
            <br />
            <br />
            Again, thank you for the opportunity. I very much look forward to joining a solid team of like minded developers.
        </p>
    </div>
</div>
