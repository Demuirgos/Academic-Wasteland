import os

stamp = 0

def reload_if_changed(filepath, callback):
    global stamp
    if os.path.getmtime(filepath) > stamp:
        stamp = os.path.getmtime(filepath)
        print("Reloading", filepath)
        callback()

if __name__ == "__main__" :
    while True :
        reload_if_changed("./home.mdk", lambda : os.system('madoko -v home.mdk')) 