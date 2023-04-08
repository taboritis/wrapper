#!/usr/bin/osascript

on run argv
    set argList to {}
    repeat with arg in argv
        display notification "Improve yourself and try again" with title "🛑 on branch " & arg
    end repeat
end run
