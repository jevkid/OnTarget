function r = doVideoAnalysis(vidDir)
	r = 'Test';
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: doVideoAnalysis
%
% Called From: PHP script on website.
% Returns: An array of strings where each string is a score in CSV form.
% Assumptions: All images were sucessfully uploaded.
% Description: Main loop for the analysis of a series of images. It will iterate through each image and detect
%			 			   new arrows. Each time an arrow is detected, it's score and position is calculated and this
%						   information is added to a string of shots. Each of these strings is assigned to a user and
% 						 returned to PHP.
%
% PSEUDOCODE:
%
% doVideoAnalysis(video, users):
% 	frames = video.split																		# Split the video into frames.
% 	for i in xrange(0,count(frames)):												# Loop through frames.
% 		if (frame[i]['dB'] > dbLimit): 												# Check for audio cue.
% 			targetPos = getTargetPos(frames[i])									# Get the position of the target in the image.
% 			arrows = findArrows(frames[i]-frames[i-1]) 					# Returns array of dots.
% 			rings = getRings(frames[i])													# Get the rings on the frame.
% 			for j in xrange(0,count(arrows)):										# Loop through the array of new arrows.
% 				user = getUser(users, arrows[j])									# Find the user for this arrow.
% 				score = calculateScore(rings, arrows[j])					# Add the scores to the arrows string.
% 				angle = calculateAngle(targetPos, arrows[j])			# Add the angles to the arrows string.
% 				scores[user] += score+":"+angle+";"								# Add the score and angle to the users arrow string.
% 	return scores
