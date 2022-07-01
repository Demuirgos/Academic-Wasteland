uses = [
    ("User registration" ,"Register", "The Actor Registers in the system", ["Host", "Visitor"], "Visiting the System (Website, Apps)", ["the Actor visits the webiste/Apps", "the actor enter their credentials", "the system verifies the data"], ["The actor is potential Visitor", "The actor is potential Host", "The actor is potential Partner"], ["Actor un-registered"], ["Actor registered"], ["Actor must have been registered in the system"]), 
    ("User Authentication" ,"Authenticate", "The Actor Authenticate with the System", ["Host", "Visitor"], "Visiting the System (Website, Apps)", ["the Actor visits the webiste/Apps", "the actor enter their credentials", "the system verifies the data"], ["the Actor authenticates using Classic logins : Email, Password", "the Actor authenticates using WEB3 tokens : wallet + User token"], ["Actor un-authenticated"], ["Actor has access to the build"], ["Actor must have been registered in the system"]), 
    ("User logout" ,"Logout", "The Actor logs out of the System", ["Host", "Visitor"], "Clicking logout or exit", ["the Actor clicks on Exit button", "the app navigates to the main page"], ["Actor Exits The app", "Actor clicks Logout"], ["Actor authenticated"], ["Actor un-authenticated and has no access to the spaces"], ["Actor must be authenticated"]), 
    ("User Room join" ,"Join Room", "The Actor Joins a Virtual Space in the app", ["Visitor"], "Selecting a space", ["the actor Authenticates", "the actor browses the spaces", "the actor selects a space", "the actor joins that space"], ["The actor joins his own spaces", "the actor joins public spaces"], ["3D virtual world unaccessible"], ["player spawns in a virtual space"], ["Actor must be authenticated"]), 
    ("User Room exploration" ,"Explore Room", "The Actor Explore Virtual Spaces in the app", ["Visitor"], "Joining The Space", ["the actor joins a space", "the actor gets the avatar", "the controls get activate", "the actor can move the avatar"], ["the actor can use touch controls", "the actor can use VR controls", "the actor can use Keyboard/Mouse controls"], ["Avatar un-accessible"], ["avatar present and controllable"], ["Actor must join a space"]), 
    ("User Room leave" ,"Leave Room", "The Actor leave the virtual Space", ["Visitor"], "Clicking on Leave Space", ["the actor click on Exit button", "the system navigate to main menu"], ["Actor Exits The app", "Actor Leave the space"], ["Actor state in Space"], ["Actor state out of space"], ["Actor must be in a space"]), 
    ("User in space interactions with users" ,"Interact With Users", "Actor can communicate and Interact with other users in the shared space", ["Visitor"], "Joining The Space", ["the actor joins a space", "the actor gets In space UI", "the controls get activated", "the actor can use UI to communicate"], ["The Actor Uses Voice chat", "The Actor Uses Text chat", "The Actor Uses Emotes"], ["Actor cant interact with other users"], ["Actor Interacts with users in the shared space"], ["Actor must be in a space"]), 
    ("User in space interactions with inanimate objects" ,"Interact With Objects", "Actor can communicate and Interact with other users in the shared space", ["Visitor"], "Joining The Space", ["the actor joins a space", "the actor gets In space UI", "the controls get activated", "the actor can use UI to communicate"], ["The Actor Uses Voice chat", "The Actor Uses Text chat", "The Actor Uses Emotes"], ["Actor cant interact with other users"], ["Actor Interacts with users in the shared space"], ["Actor must be in a space"]), 
]

"""

    Day & Min Temp & Max Temp & Summary \\ \hline
    Monday & 11C & 22C & A clear day with lots of sunshine.  
    However, the strong breeze will bring down the temperatures. \\ \hline
    Tuesday & 9C & 19C & Cloudy with rain, across many northern regions. Clear spells 
    across most of Scotland and Northern Ireland, 
    but rain reaching the far northwest. \\ \hline
    Wednesday & 10C & 21C & Rain will still linger for the morning. 
    Conditions will improve by early afternoon and continue 
    throughout the evening. \\
\end{center}
"""
sandwich = lambda title, body : title + """
    \\begin{center}
    \\begin{tabular}{ | p{3cm} | p{12cm} |}
    \\hline
    \\hline
    \\hline""" + body + """
    \\hline
    \\end{tabular}
    \\end{center}
    \\pagebreak"""
spread = lambda items : "\\begin{itemize}[noitemsep, topsep=-8pt] \setlength\itemsep{1pt} " + " ".join(["\item {item}".format(item = item) for item in items]) + " \\end{itemize}" if len(items) > 1 else items[0]

latexString = "\n".join([ sandwich("\\subparagraph{%s}"%(title), """
        \\hline
        Use Case        & {action} \\\\
        \\hline
        Description     & {description}\\\\
        \\hline
        Actors          & {actors}\\\\
        \\hline
        Start Event     & {event}\\\\
        \\hline
        Basic Scenario  & {scenario}\\\\
        \\hline
        Variations      & {variation}\\\\
        \\hline
        Pre-Conditions  & {precon}\\\\
        \\hline
        Post-Conditions & {postcon}\\\\
        \\hline
        Constraints     & {constraints}\\\\
        \\hline
    """.format(action = action, description = desc, actors = spread(actors), event = event, scenario = spread(scenario), variation =  spread(variation), precon = spread(prec), postcon = spread(postc), constraints = spread(constraints))) for (title, action, desc, actors, event, scenario, variation, prec, postc, constraints) in uses])
print(latexString)